<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use app\models\Vragenscript;
?>
<h1>Afronding</h1>
<p>Vul hier de gegevens van hetgeen waar u een probleem mee heeft in.</p>
<p>De Hardware ID is te vinden op een sticker op de voorkant van het apparaat.</p>

<div class="vragenscript-form">
    <?php
        $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'hardware_id')->textInput(); ?>

    <?php
        if ($withSoftware) {
            echo $form->field($model, 'software_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Software::find()->all(), 'Software_ID', 'Naam'));
        }
    ?>

    <?= $form->field($model, 'beschrijving')->textarea(); ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Volgende', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>