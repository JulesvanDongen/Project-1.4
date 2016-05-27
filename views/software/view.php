<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = $model->Software_ID;
$this->params['breadcrumbs'][] = ['label' => 'Software', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Software_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Software_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Weet je zeker dat je dit item wil verwijderen?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Software_ID',
            'Naam',
            'Omschrijving',
            [
                'label' => 'Fabrikant',
                'value' => Html::a($model->fabrikantID22->Naam, ['/fabrikant/view', 'id' => $model->Fabrikant_ID22]),
                'format' => 'raw',
            ],
            [
                'label' => 'Leverancier',
                'value' => Html::a($model->leverancierID22->Naam, ['/leverancier/view', 'id' => $model->Leverancier_ID22]),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
