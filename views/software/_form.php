<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Software */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="software-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Omschrijving')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fabrikant_ID22')->textInput() ?>

    <?= $form->field($model, 'Leverancier_ID22')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
