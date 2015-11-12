<?php

namespace backend\controllers;

use Yii;
use backend\models\Reqprogram;
use backend\models\ReqprogramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
/**
 * ReqprogramController implements the CRUD actions for Reqprogram model.
 */
class ReqprogramController extends Controller
{
      public function init() {
        $session = new Session();
        $session->open();
        if (empty($_SESSION['userid'])) {
            return $this->redirect('index.php?r=login/login');
        }
    }  
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reqprogram models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReqprogramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pagename = "reqprogram";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagename'=>$pagename,
        ]);
    }

    /**
     * Displays a single Reqprogram model.
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
     * Creates a new Reqprogram model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      
        $model = new Reqprogram();

        if ($model->load(Yii::$app->request->post())) {
            $session = new Session();
            $session->open();
            $model->requestby = $session['userid'];
            if($model->save()){
                 return $this->redirect(['view', 'id' => $model->recid]);
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reqprogram model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reqprogram model.
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
     * Finds the Reqprogram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reqprogram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reqprogram::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
