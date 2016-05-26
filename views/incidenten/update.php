<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Incidenten */

$this->title = 'Update Incidenten: ' . $model->Incident_ID;
$this->params['breadcrumbs'][] = ['label' => 'Incidentens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Incident_ID, 'url' => ['view', 'id' => $model->Incident_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incidenten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
