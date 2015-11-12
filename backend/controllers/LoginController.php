<?php
namespace backend\controllers;
use common\models\LoginForm;
use yii\web\Controller;
use Yii;
use yii\web\Session;
use common\models\User;

class LoginController extends Controller{
   public function actionLogin()
    {
      
//
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
          //  return $this->goBack();
            
            $use = User::findOne(Yii::$app->user->id);
            $session=new Session();
           $session->open();
      
          $session['userid'] = Yii::$app->user->id;
          $session['username'] = $use->username;
          $session['groupid'] = $use->groupid;
          $session['departmentid'] = $use->departmentid;
            if($use->groupid ==1){
                return $this->redirect('index.php?r=adashboard');
            }
            else{
                return $this->redirect('index.php?r=udashboard');
            }
            
        } else {
            return $this->render('mylogin', [
                'model' => $model,
            ]);
        }
       
        return $this->render('mylogin', [
                'model' => $model,
           ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        if(isset($_SESSION['userid'])){
            $session = new Session();
            $session->remove('userid');
            $session->remove('username');
            $session->remove('groupid');
        }
        $model = new LoginForm();
       
       return $this->redirect('index.php?r=login/login');
    }
    
}