<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locatie */

$this->title = 'Update Locatie: ' . $model->Locatie_ID;
$this->params['breadcrumbs'][] = ['label' => 'Locaties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Locatie_ID, 'url' => ['view', 'id' => $model->Locatie_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locatie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
