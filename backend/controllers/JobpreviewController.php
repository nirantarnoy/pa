<?php
namespace backend\controllers;
use backend\models\Alljobs;
use yii\web\Session;



class JobpreviewController extends \yii\base\Controller{
    public $layout;
    public function actionIndex()
    {
        return $this->render('index');
       
    }
    public function actionCreateid(){
        $this->layout = '';
        if (\yii::$app->request->isAjax) {
            $id = \yii::$app->request->post('pk');
            $session = new Session();
            $session->open();
            
            $session['recid']=$id;
        }
        
    }
     public function actionShowjob(){
            $session = new Session();
            $session->open();
            $model = Alljobs::find()->where(['recid'=>$session['recid']])->all();
            
            if($model)
            {
                $session->remove('recid');
            $this->layout = 'mylayout';
            return $this->render('index',['model'=>$model]);
            }
    
    }
}

