<?php

namespace app\controllers;

use app\helpers\CurlHelper;
use app\models\User;
use Yii;
use yii\helpers\Json;
use yii\web\Response;
use app\helpers\CookiesHelper;

class RegisterController extends \yii\web\Controller
{
    const API_URL = 'http://test.vrgsoft.net/feedbacks';

    public function beforeAction($action)
    {
        if (!Yii::$app->request->cookies->has('id_form') && $action->id !== 'index') {
            $this->redirect(['/register']);
            return false;
        }
        return parent::beforeAction($action);
    }

    /**
     * method registration step by step form
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $model = new User(['scenario' => User::SCENARIO_FIRST_STEP]);
        $cookie = new CookiesHelper();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cookie->addCookie(['id_form' => $model->id]);
            $cookie->addCookie(['step' => 'second']);
            return $this->redirect(['second-step']);
        }

        switch (Yii::$app->request->cookies->get('step')) {
            case 'second':
                $this->redirect(['second-step']);
                break;
            case 'three':
                $this->redirect(['three-step']);
                break;
        }

        return $this->render('first_form', [
            'model' => $model,
        ]);
    }

    /**
     * second step registration
     * @return string|Response
     */
    public function actionSecondStep()
    {
        $cookie = new CookiesHelper();

        $model = User::findOne(Yii::$app->request->cookies->get('id_form'));
        $model->setScenario(User::SCENARIO_SECOND_STEP);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cookie->addCookie(['step' => 'three']);
            return $this->redirect(['three-step']);
        }

        return $this->render('second_form', [
            'model' => $model,
        ]);
    }

    /**
     *  three step registration
     * @return User|string|null
     */
    public function actionThreeStep()
    {
        $model = User::findOne(Yii::$app->request->cookies->get('id_form'));
        $model->setScenario(User::SCENARIO_THREE_STEP);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['three-step']);
        }

        return $this->render('three_form', [
            'model' => $model,
        ]);
    }

    /**
     * send user data for api
     * @return string
     */
    public function actionSendData()
    {
        $model = User::findOne(Yii::$app->request->cookies->get('id_form'));

        $data = [
            'client_id' => $model->id,
            'address' => $model->address,
            'comment' => $model->comment,
        ];

        $curl = new CurlHelper(self::API_URL, $data);
        $feedbackDataId = $curl->sendPost();

        $model->feedbackDataId = $feedbackDataId;

        if (!$model->save()) {
            throw new \DomainException('Ошибка сохранения данных');
        }

        Yii::$app->session->setFlash('success', 'Спасибо, регистрация прошла успешно!!!');
        Yii::$app->response->cookies->remove('id_form');
        Yii::$app->response->cookies->remove('step');

        return $this->render('result', [
            'model' => $model,
        ]);
    }

}
