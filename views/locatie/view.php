<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locatie */

$this->title = $model->Locatie_ID;
$this->params['breadcrumbs'][] = ['label' => 'Locaties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Locatie_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Locatie_ID], [
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
            'Locatie_ID',
            'Adres',
            'Postcode',
            'Telefoon',
        ],
    ]) ?>

</div>
