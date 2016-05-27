<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hardware */

$this->title = 'Create Hardware';
$this->params['breadcrumbs'][] = ['label' => 'Hardwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hardware-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'leveranciers' => $leveranciers,
        'fabrikanten' => $fabrikanten,
        'locaties' => $locaties,
    ]) ?>

</div>
