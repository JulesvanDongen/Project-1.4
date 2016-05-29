<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use app\models\Vragenscript;
?>
<h1>Computer</h1>

<div class="vragenscript-form">
    <?php
    $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'o1')->radioList($options, ['separator' => '<br>']); ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Volgende', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>