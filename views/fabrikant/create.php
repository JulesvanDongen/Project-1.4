<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fabrikant */

$this->title = 'Nieuwe fabrikant aanmaken';
$this->params['breadcrumbs'][] = ['label' => 'Fabrikants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabrikant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
