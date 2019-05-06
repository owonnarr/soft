<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 26.12.18
 * Time: 14:49
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-6 col-xs-12">
        <?php $form = ActiveForm::begin([
            'method' => 'POST',
            'action' => ['three-step']
        ]); ?>

        <?= $form->field($model, 'comment')->textarea([
            'rows' => 6,
            'class' => 'form-control comment_input'
        ]) ?>

        <?= Html::submitButton(Yii::t('app', 'Отправить данные'), [
                'class' => 'btn btn-default pull-left save_comment',
        ]) ?>

        <?php ActiveForm::end(); ?>


        <?= Html::a('Зарегистрироваться', \yii\helpers\Url::toRoute(['send-data']), [
                'class' => 'btn btn-success pull-right send_post_register',
        ]) ?>



    </div>
</div>