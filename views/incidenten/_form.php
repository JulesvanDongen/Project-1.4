<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Incidenten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="incidenten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Hardware_ID')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Hardware::find()->all(), 'Hardware_ID', 'Hardware_ID'))->label('Hardware') ?>

    <?= $form->field($model, 'Software_ID')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Software::find()->all(), 'Software_ID', 'Naam'), ['prompt' => 'Software'])->label('Software') ?>

    <?= $form->field($model, 'Probleembeschrijving')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Niet_oplosbaar')->checkbox() ?>

    <?= $form->field($model, 'Afgehandeld')->checkbox() ?>

    <?= $form->field($model, 'Prioriteit')->dropDownList(\app\models\Incidenten::$prioriteiten, ['prompt' => 'Prioriteit']) ?>

    <?php
        if ($model->inBehandelingDoor === null) {
            echo $form->field($model, 'neemInBehandeling')->checkbox();
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
