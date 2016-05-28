<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HardSoftwareKoppeling */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hard-software-koppeling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Hardware_ID')->textInput() ?>

    <?= $form->field($model, 'Software_ID')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Software::find()->all(), 'Software_ID', 'Naam'), ['prompt' => 'Selecteer de software' ])->label('Software') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
