<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leveranciers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leverancier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leverancier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Leverancier_ID',
            'Naam',
            'Adres',
            'Telefoon',
            'Email:email',
            // 'Rekeningsnummer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
