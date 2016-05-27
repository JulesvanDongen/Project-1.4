<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Scholengroep de Hondsrug',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $items = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest) {
        array_push($items, ['label' => 'Login', 'url' => ['/site/login']]);
    } else if (Yii::$app->user->can('updateIncident')) {
        array_push($items,
            ['label' => 'Items', 'items' => [
                ['label' => 'Leveranciers', 'url' => ['/leverancier/index']],
                ['label' => 'Fabrikanten', 'url' => ['/fabrikant/index']],
                ['label' => 'Software', 'url' => ['/software/index']],
                ['label' => 'Hardware', 'url' => ['/hardware/index']],
                ['label' => 'Locatie', 'url' => ['/locatie/index']],
                ['label' => 'Incidenten', 'url' => ['/incidenten/index']],
            ]]
        );

        array_push($items, ['label' => 'Incidenten', 'items' => [
            ['label' => 'Binnenkomend', 'url' => ['/incidenten/binnenkomend']],
            ['label' => 'In behandeling', 'url' => ['/incidenten/in-behandeling']],
            ['label' => 'Niet oplosbaar', 'url' => ['/incidenten/niet-oplosbaar']],
        ]]);

        array_push(
            $items,
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        );
    } else {
        array_push(
            $items,
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Scholengroep de Hondsrug <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
