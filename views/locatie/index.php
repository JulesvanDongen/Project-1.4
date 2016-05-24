<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locaties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nieuwe locatie toevoegen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Locatie_ID',
            'Adres',
            'Postcode',
            'Telefoon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
