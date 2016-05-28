<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HardSoftwareKoppeling */

$this->title = $model->Hardware_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hard Software Koppelings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hard-software-koppeling-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Hardware_ID' => $model->Hardware_ID, 'Software_ID' => $model->Software_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Hardware_ID' => $model->Hardware_ID, 'Software_ID' => $model->Software_ID], [
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
            'Software_ID',
        ],
    ]) ?>

</div>
