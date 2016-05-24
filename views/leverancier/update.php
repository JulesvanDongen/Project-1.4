<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leverancier */

$this->title = 'Update Leverancier: ' . $model->Leverancier_ID;
$this->params['breadcrumbs'][] = ['label' => 'Leveranciers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Leverancier_ID, 'url' => ['view', 'id' => $model->Leverancier_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leverancier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
