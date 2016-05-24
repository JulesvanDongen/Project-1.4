<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fabrikant */

$this->title = 'Update Fabrikant: ' . $model->Fabrikant_ID;
$this->params['breadcrumbs'][] = ['label' => 'Fabrikants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Fabrikant_ID, 'url' => ['view', 'id' => $model->Fabrikant_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fabrikant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
