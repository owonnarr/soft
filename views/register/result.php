<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 26.12.18
 * Time: 14:49
 */

use yii\widgets\ActiveForm;

?>

<div class="row">
    <div class="col-md-6 col-xs-12">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'feedbackDataId')->textInput(['disabled' => true])->label('Result response') ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>