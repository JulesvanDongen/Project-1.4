<?php

namespace app\controllers;

class VragenScriptController extends \yii\web\Controller
{
    public function actionAfronding()
    {
        return $this->render('afronding');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
