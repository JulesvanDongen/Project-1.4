<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Leverancier */

$this->title = $model->Leverancier_ID;
$this->params['breadcrumbs'][] = ['label' => 'Leveranciers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leverancier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Leverancier_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Leverancier_ID], [
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
            'Leverancier_ID',
            'Naam',
            'Adres',
            'Telefoon',
            'Email:email',
            'Rekeningsnummer',
        ],
    ]) ?>

</div>
