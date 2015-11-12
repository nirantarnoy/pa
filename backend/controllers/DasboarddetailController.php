<?php

namespace backend\controllers;

use Yii;
use backend\models\Dasboarddetail;
use backend\models\DasboarddetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\Session;
/**
 * DasboarddetailController implements the CRUD actions for Dasboarddetail model.
 */
class DasboarddetailController extends Controller
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
     * Lists all Dasboarddetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DasboarddetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionFinished($uid)
    {
       
        $totalCount = Dasboarddetail::find()->where(['requestby'=>$uid])->count();
        $pages = new Pagination([
      'totalCount' => $totalCount,
      'pageSize' => 5
      ]);
        $title = "ใบสั่งงานดำเนินการล่าสุด";
        $type = "finishedorproblem";
        $searchModel = Dasboarddetail::find()->where(['requestby'=>$uid])
              ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        
        return $this->render('index', [
            'model' => $searchModel,
            'n' => 1,
            'pages'=>$pages,
            'ptitle'=>$title,
            'ptype'=>$type,
        ]);
    }
    public function actionProblem()
    {
        $searchModel = new DasboarddetailSearch();
         $dataProvider = $searchModel->search(200);
        // $totalCount = Dasboarddetail::find()->where(['requestby'=>$uid])->count();
        $pages = new Pagination([
      //'totalCount' => $totalCount,
      'pageSize' => 5
      ]);
        $title = "ใบสั่งงานมีปัญหา";
          $type = "finishedorproblem";
//        $searchModel = Dasboarddetail::find()->where(['requestby'=>$uid])
//              ->offset($pages->offset)
//                ->limit($pages->limit)
//                ->all();
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $searchModel,
            'n' => 1,
            'pages'=>$pages,
            'ptitle'=>$title,
            'ptype'=>$type,
        ]);
    }
 public function actionApproval()
    {
        $searchModel = new DasboarddetailSearch();
         $dataProvider = $searchModel->search(1);
        // $totalCount = Dasboarddetail::find()->where(['jobstatus'=>1])->count();
        $pages = new Pagination([
     // 'totalCount' => $totalCount,
      'pageSize' => 5
      ]);
        $title = "ใบสั่งงานรออนุมัติ";
          $type = "approval";
//        $searchModel = Dasboarddetail::find()->where(['jobstatus'=>1])
//              ->offset($pages->offset)
//                ->limit($pages->limit)
//                ->all();
//        
        return $this->render('index', [
            'model' => $searchModel,
             'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'n' => 1,
            'pages'=>$pages,
            'ptitle'=>$title,
            'ptype'=>$type,
        ]);
    }
    /**
     * Displays a single Dasboarddetail model.
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
     * Creates a new Dasboarddetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dasboarddetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dasboarddetail model.
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
     * Deletes an existing Dasboarddetail model.
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
     * Finds the Dasboarddetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dasboarddetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dasboarddetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
