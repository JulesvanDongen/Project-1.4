<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locatie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locatie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefoon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Toevoegen' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
