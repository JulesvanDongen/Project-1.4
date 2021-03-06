<?php

namespace app\controllers;

use app\models\Fabrikant;
use app\models\HardSoftwareKoppeling;
use app\models\Leverancier;
use app\models\Locatie;
use Yii;
use app\models\Hardware;
use app\models\HardwareSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * HardwareController implements the CRUD actions for Hardware model.
 */
class HardwareController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Hardware models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HardwareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hardware model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'software' => new ActiveDataProvider([
               'query' => HardSoftwareKoppeling::find()
                   ->where(['Hardware_ID' => $id])
                   ->joinWith('software')
            ]),
        ]);
    }

    /**
     * Creates a new Hardware model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hardware();
        $model->Jaar_van_aanschaf = date('Y');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Hardware_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'leveranciers' => Leverancier::find()->all(),
                'fabrikanten' => Fabrikant::find()->all(),
                'locaties' => Locatie::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing Hardware model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Hardware_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'leveranciers' => Leverancier::find()->all(),
                'fabrikanten' => Fabrikant::find()->all(),
                'locaties' => Locatie::find()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing Hardware model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hardware model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hardware the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hardware::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
