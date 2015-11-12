<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\data\Pagination;
use backend\models\AdashboardSearch;

$session = new Session();
$session->open();

use backend\models\Adashboard;

/**
 * AdashboardController implements the CRUD actions for Adashboard model.
 */
class AdashboardController extends Controller {
 public function init() {
        $session = new Session();
        $session->open();
        if (empty($_SESSION['userid'])) {
            return $this->redirect('index.php?r=login/login');
        }
    }  
    public function behaviors() {
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
     * Lists all Adashboard models.
     * @return mixed
     */
    public function actionIndex() {
       
              $searchModel = new AdashboardSearch();
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
              $dataProvider->pagination->pageSize=10;
        
       
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);

        $session = new Session();
        $session->open();

        $countJob = Adashboard::find()->count();
        $countProgramActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>1])->count();
        $countUserActive = Adashboard::find()->where(['jobstatus' => 2,'jobtype'=>2])->count();
        $countReportActive = Adashboard::find()->where(['jobstatus' => 2,'jobtype'=>3])->count();
        $countDeviceActive = Adashboard::find()->where(['jobstatus' => 2,'jobtype'=>4])->count();
        $countCameraActive = Adashboard::find()->where(['jobstatus' => 2,'jobtype'=>5])->count();
        $countPhoneActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>6])->count();
        $countRestoreActive = Adashboard::find()->where(['jobstatus' => 2,'jobtype'=>7])->count();

        $totalCount = Adashboard::find()->count();
        $pages = new Pagination([
            'totalCount' => $totalCount,
            'pageSize' => 10
        ]); 
        
        $model = Adashboard::find()
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

      
        
        return $this->render('index', [
                    'model' => $model,
             'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                    'programactive' => $countProgramActive,
                    'useractive' => $countUserActive,
                    'reportactive' => $countReportActive,
                    'deviceactive' => $countDeviceActive,
                    'cameraactive' => $countCameraActive,
                    'phoneactive' => $countPhoneActive,
                    'restoreactive' => $countRestoreActive,
                    'alljob' => $countJob,
                    'pages' => $pages,
        ]);
    }
public function actionShowjob($type) {
        $session = new Session();
        $session->open();
        
      
        if($type==1)
        {
            $session->setFlash('msg',"แจ้งปัญหาข้อมูลและโปรแกรมคอมพิวเตอร์");
        }
        if($type==2)
        {
             $session->setFlash('msg',"ร้องขอผู้ใช้งาน");
        }
        if($type==3)
        {
            $session->setFlash('msg',"ร้องขอรายงาน");
        }
        if($type==4)
        {
             $session->setFlash('msg',"ร้องขออุปกรณ์คอมพิวเตอร์");
        }
        if($type==5)
        {
             $session->setFlash('msg',"แจ้งปัญหากล้องวงจรปิด");
        }
        if($type==6)
        {
             $session->setFlash('msg',"แจ้งปัญหาโทรศัพท์");
        }
        if($type==7)
        {
            $session->setFlash('msg',"ร้องขอกู้ข้อมูล");
        }
        
              $searchModel = new AdashboardSearch();
              
              $dataProvider = $searchModel->search($type);
              $dataProvider->pagination->pageSize=10;

        
       
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);

        $session = new Session();
        $session->open();

        $countJob = Adashboard::find()->count();
        $countProgramActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>1])->count();
        $countUserActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>2])->count();
        $countReportActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>3])->count();
        $countDeviceActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>4])->count();
        $countCameraActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>5])->count();
        $countPhoneActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>6])->count();
        $countRestoreActive = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>7])->count();

        $totalCount = Adashboard::find()->count();
        $pages = new Pagination([
            'totalCount' => $totalCount,
            'pageSize' => 10
        ]); 
        
        $model = Adashboard::find()
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

      
        
        return $this->render('index', [
                    'model' => $model,
             'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                    'programactive' => $countProgramActive,
                    'useractive' => $countUserActive,
                    'reportactive' => $countReportActive,
                    'deviceactive' => $countDeviceActive,
                    'cameraactive' => $countCameraActive,
                    'phoneactive' => $countPhoneActive,
                    'restoreactive' => $countRestoreActive,
                    'alljob' => $countJob,
                    'pages' => $pages,
        ]);
    }
    /**
     * Displays a single Adashboard model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Adashboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Adashboard();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Adashboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Adashboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Adashboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adashboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
     public function actionViewPdf()
      {
          $filename = $_GET['filename'] . '.pdf';
          $filepath = '/path/to/your/pdfs/' . $filename;

          if(file_exists($filepath))
          {
              // Set up PDF headers
              header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename="' . $filename . '"');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize($filepath));
              header('Accept-Ranges: bytes');

              // Render the file
              readfile($filepath);
          }
          else
          {
             // PDF doesn't exist so throw an error or something
          }
      }
    
    protected function findModel($id) {
        if (($model = Adashboard::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
