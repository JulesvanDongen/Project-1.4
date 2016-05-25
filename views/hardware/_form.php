<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hardware */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hardware-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Leverancier_ID')->dropDownList(\yii\helpers\ArrayHelper::map($leveranciers, 'Leverancier_ID', 'Naam'))->label('Leverancier') ?>

    <?= $form->field($model, 'Fabrikant_ID')->dropDownList(\yii\helpers\ArrayHelper::map($fabrikanten, 'Fabrikant_ID', 'Naam'))->label('Fabrikant') ?>

    <?= $form->field($model, 'Locatie_ID')->dropDownList(\yii\helpers\ArrayHelper::map($locaties, 'Locatie_ID', 'Adres'))->label('Locatie') ?>

    <?= $form->field($model, 'Besturingssysteem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Omschrijving')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jaar_van_aanschaf')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
