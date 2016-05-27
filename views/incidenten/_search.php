<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IncidentenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="incidenten-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Incident_ID') ?>

    <?= $form->field($model, 'Hardware_ID') ?>

    <?= $form->field($model, 'Software_ID') ?>

    <?= $form->field($model, 'Probleembeschrijving') ?>

    <?= $form->field($model, 'Datum') ?>

    <?php // echo $form->field($model, 'Tijd') ?>

    <?php // echo $form->field($model, 'Ingevuld_tijdens_vragenscript') ?>

    <?php // echo $form->field($model, 'Niet_oplosbaar') ?>

    <?php // echo $form->field($model, 'Afgehandeld') ?>

    <?php // echo $form->field($model, 'Prioriteit') ?>

    <?php // echo $form->field($model, 'In_behandeling_door') ?>

    <?php // echo $form->field($model, 'Ingevuld_door') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
