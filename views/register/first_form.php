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
                'action' => ['index'],
        ]); ?>

        <?= $form->field($model, 'first_name')->textInput()->label('Имя') ?>
        <?= $form->field($model, 'last_name')->textInput()->label('Фамилия') ?>
        <?= $form->field($model, 'phone')->textInput()->label('Номер телефона') ?>

        <?= Html::submitButton(Yii::t('app', 'Следующий шаг'), ['class' => 'btn btn-default',]) ?>

        <?php $form = ActiveForm::end() ?>

    </div>
</div>