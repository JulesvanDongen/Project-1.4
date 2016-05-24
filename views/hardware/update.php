<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hardware */

$this->title = 'Update Hardware: ' . $model->Hardware_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hardwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Hardware_ID, 'url' => ['view', 'id' => $model->Hardware_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hardware-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
