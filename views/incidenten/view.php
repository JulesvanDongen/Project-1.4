<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Incidenten */

$this->title = $model->Incident_ID;
$this->params['breadcrumbs'][] = ['label' => 'Incidentens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if ($model->software !== null) {
    $softwareURL = Html::a($model->software->Naam, \yii\helpers\Url::to(['/software/view', 'id' => $model->Software_ID]));
} else {
    $softwareURL = 'Niet ingevuld';
}
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
            [
                'label' => 'Hardware',
                'value' => Html::a($model->Hardware_ID, \yii\helpers\Url::to(['/hardware/view', 'id' => $model->Hardware_ID])),
                'format' => 'raw',
            ],
            [
                'label' => 'Software',
                'value' => $softwareURL,
                'format' => 'raw',
            ],
            'Probleembeschrijving:ntext',
            'Datum',
            'Tijd',
            'Niet_oplosbaar:BOOLEAN',
            'Afgehandeld:boolean',
            'Prioriteit',
            'In_behandeling_door',
            'Ingevuld_door',
        ],
    ]) ?>

    <?php
        if ($model->Ingevuld_tijdens_vragenscript != '') {
            echo '<h2>Ingevulde vragen</h2>';
            $ingevuld = json_decode($model->Ingevuld_tijdens_vragenscript);
            $vragenscriptModel = new \app\models\Vragenscript();

            foreach ($ingevuld as $key => $value) {
                if ($value != null) {
                    echo '<label>' . $vragenscriptModel->getAttributeLabel($key) . '</label><br>';
                    echo '<p>' . $value . '</p>';
                }
            }
        }
    ?>

</div>
