<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use app\models\Vragenscript;
?>
<h1>Printer</h1>

<div class="vragenscript-form">
    <?php
        $form = ActiveForm::begin();
        var_dump($model->attributes);
    ?>

    <?= $form->field($model, 'p1')->radioList(Vragenscript::$p1answers, ['separator' => '<br>']); ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Volgende', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>