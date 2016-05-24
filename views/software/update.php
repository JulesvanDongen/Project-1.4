<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = 'Update Software: ' . $model->Software_ID;
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Software_ID, 'url' => ['view', 'id' => $model->Software_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="software-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
