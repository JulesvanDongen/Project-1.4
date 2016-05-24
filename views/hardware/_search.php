<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HardwareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hardware-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Hardware_ID') ?>

    <?= $form->field($model, 'Leverancier_ID') ?>

    <?= $form->field($model, 'Fabrikant_ID') ?>

    <?= $form->field($model, 'Locatie_ID') ?>

    <?= $form->field($model, 'Besturingssysteem') ?>

    <?php // echo $form->field($model, 'Omschrijving') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Jaar_van_aanschaf') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
