<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Toen de webserver jouw aanvraag in behandeling nam is de bovenstaande fout opgetreden.
    </p>
    <p>
        Neem contact met ons op als deze fout vaker voorkomt.
    </p>

</div>
