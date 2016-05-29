<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Vragenscript;

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
        $session = Yii::$app->session;
        $model = $this->getVragenscript();

        if ($model->load(Yii::$app->request->post())) {
            $session->open();
            $model->c1 = null;
            $model->c2 = null;
            $model->c3 = null;
            $model->c4 = null;
            $model->o1 = null;
            $model->p1 = null;
            $session['vragenscript'] = $model->attributes;

            if ($model->h1 == 'computer') {
                return $this->redirect(['computer1']);
            } else if ($model->h1 == 'printer_of_scanner') {
                return $this->redirect(['printer-scanner']);
            } else if ($model->h1 == 'overig') {
                return $this->redirect(['overig1']);
            } else {
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionPrinterScanner() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $model->type = 'Onbekend';
                $session['vragenscript'] = $model->attributes;
                return $this->redirect(['finalize', 'withSoftware' => false]);
            } else {
                return $this->render('printer', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionComputer1() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $session['vragenscript'] = $model->attributes;

                if ($model->c1 == 'ja') {
                    return $this->redirect(['computer2']);
                } else {
                    $model->type = 'Hardware';
                    $session['vragenscript'] = $model->attributes;
                    return $this->redirect(['finalize',
                        'withSoftware' => false
                    ]);
                }

            } else {
                return $this->render('computer1', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionComputer2() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $session['vragenscript'] = $model->attributes;

                if ($model->c2 == 'ja') {
                    return $this->redirect(['computer3']);
                } else {
                    $model->type = 'Netwerk';
                    $session['vragenscript'] = $model->attributes;
                    return $this->redirect(['finalize', 'withSoftware' => false]);
                }

            } else {
                return $this->render('computer2', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionComputer3() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $session['vragenscript'] = $model->attributes;

                if ($model->c3 == 'ja') {
                    return $this->redirect(['computer4']);
                } else {
                    $model->type = 'Netwerk';
                    $session['vragenscript'] = $model->attributes;
                    return $this->redirect(['finalize', 'withSoftware' => false]);
                }

            } else {
                return $this->render('computer3', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionOverig1() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $session['vragenscript'] = $model->attributes;
                return $this->redirect(['overig2']);


            } else {
                if (Yii::$app->user->can('updateIncident')) {
                    $options = Vragenscript::$o1adminanswers;
                } else {
                    $options = Vragenscript::$o1otheranswers;
                    $this->redirect(['overig2']);
                }

                return $this->render('overig1', [
                    'model' => $model,
                    'options' => $options,
                ]);
            }
        }
    }

    public function actionOverig2() {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                $session['vragenscript'] = $model->attributes;

                if ($model->o2 == 'ja') {
                    $model->Type = 'software';
                    $session['vragenscript'] = $model->attributes;
                    return $this->redirect(['finalize', 'withSoftware' => true]);
                } else if ($model->o2 == 'nee') {
                    $model->Type = 'hardware';
                    $session['vragenscript'] = $model->attributes;
                    return $this->redirect(['finalize', 'withSoftware' => false]);
                } else {
                    return $this->redirect('index');
                }

            } else {
                return $this->render('overig2', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionFinalize($withSoftware) {
        $session = Yii::$app->session;

        if (!$session->has('vragenscript')) {
            return $this->redirect('index');
        } else {
            $model = $this->getVragenscript();

            if ($model->load(Yii::$app->request->post())) {
                // Save the incident
                $session['vragenscript'] = $model->attributes;

                $model = $this->getVragenscript();
                $model = $model->generateNewIncident();
                $model->save();

                $session['vragenscript'] = null;

                return $this->redirect(['afronding']);
            } else {
                return $this->render('finalize', [
                    'model' => $model,
                    'withSoftware' => $withSoftware,
                ]);
            }
        }
    }

    private function getVragenscript() {
        $vragenscript = new Vragenscript();
        $session = Yii::$app->session;

        if ($session->has('vragenscript')) {
            foreach ($session['vragenscript'] as $key => $value) {
                if ($value !== null) {
                    $vragenscript[$key] = $value;
                }
            }
            return $vragenscript;
        } else {
            return $vragenscript;
        }
    }
}
