<?php

namespace app\controllers;

use yii\filters\AccessControl;

class VragenScriptController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'afronding'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['afronding'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    public function actionAfronding()
    {
        return $this->render('afronding');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
