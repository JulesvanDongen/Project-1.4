<?php

namespace app\controllers;

use Yii;
use app\models\HardSoftwareKoppeling;
use app\models\HardSoftwareKoppelingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HardSoftwareKoppelingController implements the CRUD actions for HardSoftwareKoppeling model.
 */
class HardSoftwareKoppelingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HardSoftwareKoppeling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HardSoftwareKoppelingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HardSoftwareKoppeling model.
     * @param integer $Hardware_ID
     * @param integer $Software_ID
     * @return mixed
     */
    public function actionView($Hardware_ID, $Software_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($Hardware_ID, $Software_ID),
        ]);
    }

    /**
     * Creates a new HardSoftwareKoppeling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($Hardware_ID = null)
    {
        $model = new HardSoftwareKoppeling();

        if ($Hardware_ID !== null) {
            $model->Hardware_ID = $Hardware_ID;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/hardware/view', 'id' => $model->Hardware_ID]);
//            return $this->redirect(['view', 'Hardware_ID' => $model->Hardware_ID, 'Software_ID' => $model->Software_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HardSoftwareKoppeling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Hardware_ID
     * @param integer $Software_ID
     * @return mixed
     */
    public function actionUpdate($Hardware_ID, $Software_ID)
    {
        $model = $this->findModel($Hardware_ID, $Software_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/hardware/view', 'id' => $model->Hardware_ID]);
//            return $this->redirect(['view', 'Hardware_ID' => $model->Hardware_ID, 'Software_ID' => $model->Software_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HardSoftwareKoppeling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Hardware_ID
     * @param integer $Software_ID
     * @return mixed
     */
    public function actionDelete($Hardware_ID, $Software_ID)
    {
        $model = $this->findModel($Hardware_ID, $Software_ID);
        $model->delete();

        return $this->redirect(['/hardware/view', 'id' => $model->Hardware_ID]);
    }

    /**
     * Finds the HardSoftwareKoppeling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Hardware_ID
     * @param integer $Software_ID
     * @return HardSoftwareKoppeling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Hardware_ID, $Software_ID)
    {
        if (($model = HardSoftwareKoppeling::findOne(['Hardware_ID' => $Hardware_ID, 'Software_ID' => $Software_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
