<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Scholengroep de Hondsrug';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welkom bij de Hondsrug</h1>

        <p class="lead">Welkom op de website van de Hondsrug</p>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Nieuws</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="">Meer nieuws &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Roosterwijzigingen</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="">Zie eerdere roosterwijzigingen &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Incident Melden</h2>

                <p>Wil je een incident melden? Log dan eerst in met jou studentennummer en wachtwoord. Vervolgens kan je via een vragenscript jou incident melden.</p>

                <p><a class="btn btn-default" href="<?php echo Url::to(['/site/login']);?>">Meld je incident hier &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
