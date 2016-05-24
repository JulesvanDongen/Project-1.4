<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fabrikant */

$this->title = $model->Fabrikant_ID;
$this->params['breadcrumbs'][] = ['label' => 'Fabrikants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabrikant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Fabrikant_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Fabrikant_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Weet je zeker dat je dit item wil verwijderen?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Fabrikant_ID',
            'Naam',
            'Adres',
            'Telefoon',
            'Email:email',
        ],
    ]) ?>

</div>
