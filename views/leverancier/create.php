<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Leverancier */

$this->title = 'Toevoegen nieuwe Leverancier';
$this->params['breadcrumbs'][] = ['label' => 'Leveranciers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leverancier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
