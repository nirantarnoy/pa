<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\Jobapprove;
use yii\filters\VerbFilter;
use common\models\Jobs;
use common\models\User;
use yii\web\Session;
use backend\models\ReqdeviceSearch;

class JobapproveController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
// 'createid' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $model = new Jobapprove();
        return $this->renderAjax('index', ['model' => $model]);
    }

    public function actionCreateid() {
        $session = new Session();
        $session->open();
        if (\yii::$app->request->isAjax) {
            $pk = \yii::$app->request->post('pk');
            $module = \yii::$app->request->post('module');
            $deparment = \yii::$app->request->post('department');


            $session['recid'] = $pk;
            $session['module'] = $module;
            $session['department'] = $deparment;

            $reccount = 0;
            $reccount = Jobs::find()->where(['recid' => $pk, 'jobstatus' => 2])->count();
            if ($reccount > 0) {
                $session->setFlash('msgstatus', 'ใบสั่งงานนี้ได้อนุมัติไปเรียบร้อยแล้ว');
            } else {
                //$session->setFlash('msgstatus','ใบสั่งงานนี้ได้อนุมัติไปเรียบร้อยแล้ว');
            }
        }
    }

    public function actionApproveprocess() {
        $session = new Session();
        $session->open();
        
        if (\Yii::$app->request->post()) {

            $count = User::find()->where(['username' => $_POST['Jobapprove']['username']])->count();

            $uid = User::find()->where(['username' => $_POST['Jobapprove']['username']])->all();
            $isuser = User::findOne(['username' => $_POST['Jobapprove']['username']]);

            $ispwd = $isuser->validatePassword($_POST['Jobapprove']['password']);
            
            
            if($count <=0 || $ispwd == false)
            {
                  $session = new Session();
                $session->open();
                $session->setFlash('msg', 'คุณไม่มีสิทธิอนุมัติใบสั่งงานนี้');
                $model = new Jobapprove();
                $pagename = "reqdevice";
                //  return $this->render('approvefail');
                return $this->render('index', ['model' => $model]);
            }

            foreach ($uid as $value) {
                $roleid = $value->roleid;
            }

            $depid = \backend\Models\Assignroledetail::findAll(['roleid' => $roleid]);
            $approve = false;
            $res = 0;
            foreach ($depid as $did) {
                foreach ($session['recid'] as $idd) {
                    $model2 = Jobs::findOne($idd);
                    $userdep = User::findOne(['id' => $model2->requestby]);
                    if ($userdep->departmentid == $did->departmentid) {
                        $model2->jobstatus = 2;

                        if ($model2->save()) {
                            $res = 1;
                        }
                    }
                }
            }

                    if ($res == 1) {
                    $session = new Session();
                    $session->open();
                    $session->setFlash('msg', 'อนุมัติใบสั่งงานเรียบร้อย');
                    unset($session['recid']);
                    if ($session['module'] == 'device') {
                        unset($session['module']);
                        unset($session['department']);
                        return $this->redirect(['reqdevice/index']);
                    } else if ($session['module'] == 'report') {
                        unset($session['module']);
                        unset($session['department']);
                        return $this->redirect(['reqreport/index']);
                    } else if ($session['module'] == 'user') {
                        unset($session['module']);
                        unset($session['department']);
                        return $this->redirect(['requser/index']);
                    }
                }else{
                    $session = new Session();
                    $session->open();
                    $session->setFlash('msg', 'คุณไม่มีสิทธิอนุมัติใบสั่งงานนี้');
                    $model = new Jobapprove();
                    $pagename = "reqdevice";
                    //    return $this->render('approvefail');
                    return $this->render('index', ['model' => $model]);
                }
            // echo var_dump($ispwd);return;
        
        } 
//        else {
//            $session = new Session();
//            $session->open();
//            $session->setFlash('msg', 'คุณไม่มีสิทธิอนุมัติใบสั่งงานนี้');
//            $model = new Jobapprove();
//            $pagename = "reqdevice";
//            //    return $this->render('approvefail');
//            return $this->render('index', ['model' => $model]);
//        }
    }

}
