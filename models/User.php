<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $comment
 * @property string $address
 * @property string $feedbackDataId
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    const SCENARIO_FIRST_STEP = 'first';
    const SCENARIO_SECOND_STEP = 'second';
    const SCENARIO_THREE_STEP = 'three';

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_FIRST_STEP] = ['first_name', 'last_name', 'phone'];
        $scenarios[self::SCENARIO_SECOND_STEP] = ['address'];
        $scenarios[self::SCENARIO_THREE_STEP] = ['comment'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'address', 'comment'], 'required', 'message' => 'Поле не может быть пустым'],
            [['first_name', 'last_name'], 'string', 'min' => 4, 'max' => 14,],
            [['phone'], 'match',
                'pattern' => '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,13}(\s*)?$/',
                'message' => \Yii::t('app', 'Телефон должен начинатся с + и быть только из цифр')],
            [['address'], 'string', 'max' => 70],
            [['feedbackDataId'], 'string', 'max' => 60],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'comment' => 'Comment',
        ];
    }
}
