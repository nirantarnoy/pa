<?php
namespace backend\controllers;
use backend\models\Homeuser;
use yii\web\Session;
use yii\data\Pagination;

$session = new Session();
$session->open();
class HomeuserController extends \yii\base\Controller{
    public function actionIndex()
    {
        $session = new Session();
        $session->open();

        $countApprove = Homeuser::find()->where(['requestby'=>$session['userid'],'jobstatus'=>1])->count();
        $countProblem = Homeuser::find()->where(['requestby'=>$session['userid'],'jobstatus'=>200])->count();
        $countFinished = Homeuser::find()->where(['requestby'=>$session['userid'],'jobstatus'=>300])->count();
        
        $totalCount = Homeuser::find()->where(['requestby'=>$session['userid']])->count();
        $pages = new Pagination([
      'totalCount' => $totalCount,
      'pageSize' => 5
      ]);
        $model = Homeuser::find()->where(['requestby'=>$session['userid']])
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        
        return $this->render('index',[
            'model'=>$model,
            'approve'=>$countApprove,
            'problem'=>$countProblem,
            'finished'=>$countFinished,
            'pages'=>$pages,
        ]);
    }
}