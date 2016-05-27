<?php

namespace app\controllers;

use Yii;
use app\models\Incidenten;
use app\models\IncidentenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * IncidentenController implements the CRUD actions for Incidenten model.
 */
class IncidentenController extends Controller
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
     * Lists all Incidenten models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncidentenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => 'Alle incidenten',
        ]);
    }

    public function actionInBehandeling()
    {
        $searchModel = new IncidentenSearch();
        $searchModel->In_behandeling_door = \Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => 'Incidenten in behandeling',
        ]);
    }

    public function actionBinnenkomend()
    {
        $searchModel = new IncidentenSearch();
        $searchModel->searchUnassigned = true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => 'Binnenkomende incidenten',
        ]);
    }

    public function actionInBehandelingNemen($id) {
        $model = Incidenten::findOne($id);

        $this->redirect(Yii::app()->request->urlReferrer);
        if ($model->In_behandeling_door !== null) {

        }
    }

    public function actionNietOplosbaar()
    {
        $searchModel = new IncidentenSearch();
        $searchModel->Niet_oplosbaar = true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => 'Niet oplosbare incidenten',
        ]);
    }

    /**
     * Displays a single Incidenten model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Incidenten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Incidenten();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Incident_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Incidenten model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $tmp = Yii::$app->request->post();
            if (is_array($tmp)) {
                if (array_key_exists('neemInBehandeling', $tmp['Incidenten'])) {
                    $tmp['Incidenten']['neemInBehandeling'] == 1 ? $model->neemInBehandeling = true : $model->neemInBehandeling = false;
                }
            }

            if ($model->neemInBehandeling === true) {
                $model->In_behandeling_door = \Yii::$app->user->id;
            }

            if ($model->validate() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->Incident_ID]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Incidenten model.
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
     * Finds the Incidenten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Incidenten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Incidenten::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
