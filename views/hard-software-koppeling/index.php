<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HardSoftwareKoppelingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hard Software Koppelings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hard-software-koppeling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hard Software Koppeling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Hardware_ID',
            'Software_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
