<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IncidentenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incidenten-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Incidenten', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Incident_ID',
            'Hardware_ID',
            'Software_ID',
            'Probleembeschrijving:ntext',
            'Datum',
             'Tijd',
             'Ingevuld_tijdens_vragenscript',
             'Niet_oplosbaar',
             'Afgehandeld',
             'Prioriteit',
//             'In_behandeling_door',
             'Ingevuld_door',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
