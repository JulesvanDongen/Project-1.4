<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Incidenten */

$this->title = $model->Incident_ID;
$this->params['breadcrumbs'][] = ['label' => 'Incidentens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incidenten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Incident_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Incident_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Incident_ID',
            'Hardware_ID',
            'Software_ID',
            'Probleembeschrijving:ntext',
            'Datum',
            'Tijd',
            'Ingevuld_tijdens_vragenscript',
            'Niet_oplosbaar:BOOLEAN',
            'Afgehandeld:boolean',
            'Prioriteit',
            'In_behandeling_door',
            'Ingevuld_door',
        ],
    ]) ?>

</div>
