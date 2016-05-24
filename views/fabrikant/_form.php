<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fabrikant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fabrikant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefoon')->textInput() ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
