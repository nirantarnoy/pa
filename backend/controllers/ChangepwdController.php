<?php
namespace backend\controllers;
use yii\web\Controller;

class ChangepwdController extends Controller{
    
    public function actionIndex()
    {
       // $this->layout = 'mylayout.php';
        $model = new \backend\Models\Changepwd();
        return $this->render('index',['model'=>$model]);
        //return $this->render('index');
    }
    public function actionDoit()
    {
        //$user = \Yii::$app->user->identity;
        $loadpost = \Yii::$app->request->post();
        
        if($loadpost)
        {
            echo "ok";
        }
        else
        {
            echo "no";
        }
       
    }
}


