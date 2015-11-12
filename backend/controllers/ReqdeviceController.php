<?php

namespace backend\controllers;

use Yii;
use backend\models\Reqdevice;
use backend\models\ReqdeviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Assets;
use common\models\Jobs;
use common\models\Jobdetails;
use yii\web\Session;

$session = new Session();
$session->open();
/**
 * ReqdeviceController implements the CRUD actions for Reqdevice model.
 */
class ReqdeviceController extends Controller
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
                    //'showdevice'=>['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reqdevice models.
     * @return mixed
     */
    public function actionIndex()
    {
         $session = new Session();
        $session->open();
        $searchModel = new ReqdeviceSearch();
        $dataProvider = $searchModel->search(['requestby'=>$_SESSION['userid']]);
        $dataProvider->pagination->pageSize =10;
        $pagename = "reqdevice";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagename'=>$pagename,
        ]);
    }

    /**
     * Displays a single Reqdevice model.
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
     * Creates a new Reqdevice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reqdevice();

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
     * Updates an existing Reqdevice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $session = new Session();
            $session->open();
            $model->requestby = $session['userid'];
            if($model->save())
            {
                 return $this->redirect(['view', 'id' => $model->recid]);
            }
           
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reqdevice model.
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
     * Finds the Reqdevice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reqdevice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionShowdevice($id)
    {
        
        $count = Assets::find()->where(['assettypeid'=> $id])->count();
       // $xx = $ass->find()->all();
        $val = Assets::find()->where(['assettypeid'=> $id])->all();
   
        if($count >0){
            foreach ($val as $data)
            {
                echo "<option value='".$data->recid."'>".$data->assetname."</option>";
            }
         
        }
        else
        {
            echo "<option> --- </option>";
        }
       

       
    }
    protected function findModel($id)
    {
        if (($model = Reqdevice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
