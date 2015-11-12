<?php

namespace backend\controllers;

use Yii;
use backend\models\Departmentrole;
use backend\models\DepartmentroleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;



/**
 * DepartmentroleController implements the CRUD actions for Departmentrole model.
 */
class DepartmentroleController extends Controller
{
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
     * Lists all Departmentrole models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new DepartmentroleSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
          $model = \common\models\Departments::find()->all();
        return $this->renderAjax('index', [
            'model' => $model,
           // 'dataProvider' => $dataProvider,
        ]);
    }
  
    public function actionCreateid()
    {
        if(\Yii::$app->request->isAjax){
            $pk = \Yii::$app->request->post("pk");
            $pk2 = \Yii::$app->request->post("rid");
            $session = new Session();
            $session->open();
            
            $session['recid']= $pk;
            $session['roleid']= $pk;
        }
    }
    public function actionAssignrole()
    {
        echo "ok";
//        $res = 0;
//        $session = new Session();
//        $session->open();
//        if(\Yii::$app->request->post()){
//            foreach ($_POST['menu']as $id){
//                $deptrole = new \common\models\Assignroledetail();
//                $deptrole->departmentid = $id;
//                $deptrole->roleid = $session['roleid'];
//               if($deptrole->save())
//               {
//                   $res +=1;
//               }
//                       }
//                       echo $res;
////                 if($res >0)
////                 {
////                     $model = \common\models\Assignroles::find()->where(['recid'=>$session['recid']])->all();
////                    // $this->redirect('assignrole/update',['model'=>$model]);
////                 }
//        }
    }

    /**
     * Displays a single Departmentrole model.
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
     * Creates a new Departmentrole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Departmentrole();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Departmentrole model.
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
     * Deletes an existing Departmentrole model.
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
     * Finds the Departmentrole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Departmentrole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Departmentrole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
