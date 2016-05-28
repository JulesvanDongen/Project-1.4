<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hardware */

$this->title = $model->Hardware_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hardwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hardware-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Hardware_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Hardware_ID], [
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
            'Hardware_ID',
            [
                'label' => 'Leverancier',
                'value' => Html::a($model->leverancier->Naam, \yii\helpers\Url::to(['/leverancier/view', 'id' => $model->Fabrikant_ID])),
                'format' => 'raw',
            ],
            [
                'label' => 'Fabrikant',
                'value' => Html::a($model->fabrikant->Naam, \yii\helpers\Url::to(['/fabrikant/view', 'id' => $model->Fabrikant_ID])),
                'format' => 'raw',
            ],
            'Locatie_ID',
            'Besturingssysteem',
            'Omschrijving',
            'Status',
            'Jaar_van_aanschaf',
        ],
    ]) ?>

    <h2>Software</h2>

    <p>
        <?= Html::a('Software toevoegen', ['/hard-software-koppeling/create', 'Hardware_ID' => $model->Hardware_ID], ['class' => 'btn btn-primary']) ?>
    </p>

    <?=
        \yii\grid\GridView::widget([
            'dataProvider' => $software,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'software.Naam',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'hard-software-koppeling'
                ],
            ],
        ]);
    ?>

</div>
