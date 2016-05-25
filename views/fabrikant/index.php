<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fabrikanten';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabrikant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nieuwe fabrikant aanmaken', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Naam',
            'Adres',
            'Telefoon',
            'Email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
