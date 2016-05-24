<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locatie */

$this->title = 'Nieuwe locatie toevoegen';
$this->params['breadcrumbs'][] = ['label' => 'Locaties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
