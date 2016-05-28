<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HardSoftwareKoppeling */

$this->title = 'Update Hard Software Koppeling: ' . $model->Hardware_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hard Software Koppelings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Hardware_ID, 'url' => ['view', 'Hardware_ID' => $model->Hardware_ID, 'Software_ID' => $model->Software_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hard-software-koppeling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
