<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HardwareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hardwares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hardware-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hardware', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Besturingssysteem',
            'Leveranciernaam',
            'Omschrijving',
            'Fabrikantnaam',
            'Adres',
            // 'Status',
            'Jaar_van_aanschaf',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
