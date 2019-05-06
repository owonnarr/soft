<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-md-6 col-xs-12">
        <?php $form = ActiveForm::begin([
            'method' => 'POST',
            'action' => ['second-step'],
        ]); ?>

        <?= $form->field($model, 'address')->textInput([
            'class' => 'form-control address_input'
        ]) ?>

        <?= Html::submitButton(Yii::t('app', 'Следующий шаг'), ['class' => 'btn btn-default',]) ?>

        <?php $form = ActiveForm::end() ?>

    </div>
</div>