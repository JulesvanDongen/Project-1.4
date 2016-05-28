<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HardSoftwareKoppeling */

$this->title = 'Hardware-software koppeling maken';
$this->params['breadcrumbs'][] = ['label' => 'Hard Software Koppelings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hard-software-koppeling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
