<?php
namespace backend\controllers;
use common\models\Jobs;
use yii\web\Session;

class JobcloseController extends \yii\web\Controller{
    public function actionIndex(){
         return $this->renderAjax('index');
    }
    public function actionNiran()
    {
       return $this->renderAjax('index');
    }

    public function actionCreateid() {
        if (\yii::$app->request->isAjax) {
            $pk = \yii::$app->request->post('pk');
            $module = \yii::$app->request->post('module');
            $session = new Session();
            $session->open();

            $session['recid'] = $pk;
           $session['module'] = $module;
        }
    }
    public function actionEndjob()
    {
       
        if(\Yii::$app->request->post())
        {
             //echo 'okddkd';
             $session = new Session();
                $session->open();
//                $res = 0;
                foreach ($session['recid'] as $id) {
                    echo $id;
                    $model = Jobs::findOne($id);
                    
                    if($_POST['closetype']==1)
                    {
                        $model->jobstatus = 100;
                    }
                    else{
                        $model->jobstatus = 3;
                    }
                    
                    $model->usdef1 = $_POST['rem'];

                    if ($model->save()) {
                        $res = 1;
                    }
                }
                if ($res == 1) {
                    
                    unset($session['recid']);
                    if($session['module']=='adashboard'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                         return $this->redirect(['adashboard/index']);
                    }
                    else if($session['module']=='report'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['reqreport/index']);
                    }
                     else if($session['module']=='user'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['requser/index']);
                    }
                    else if($session['module']=='camera'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['reqcamera/index']);
                    }
                       else if($session['module']=='telephone'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['reqtelephone/index']);
                    }
                       else if($session['module']=='restore'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['reqsetore/index']);
                    }
                       else if($session['module']=='program'){
                        unset($session['module']);
                        \Yii::$app->getSession()->setFlash('success','ดำเนินการเรียบร้อย');
                        return $this->redirect(['reqprogram/index']);
                    }
                        
                   
                }
        }
        
    }
}

