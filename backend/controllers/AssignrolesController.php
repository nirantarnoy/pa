<?php

namespace backend\controllers;

use Yii;
use backend\models\Assignroles;
use backend\models\AssignrolesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignrolesController implements the CRUD actions for Assignroles model.
 */
class AssignrolesController extends Controller
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
     * Lists all Assignroles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssignrolesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       $pagename = "assignroles";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagename'=>$pagename,
        ]);
    }
    
    /**
     * Displays a single Assignroles model.
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
     * Creates a new Assignroles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assignroles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           //echo var_dump($_POST['menu']);
            if(!empty($_POST['menu'])){
                $dept = $_POST['menu'];
            }else{
                 $dept = null;
            }
            
            if(count($dept) >0 && $_POST['Assignroles']['roleid']==1)
            {
                \common\models\Assignroledetail::deleteAll(['assignid'=>$model->recid]);
               foreach ($dept as $id){
                $deptrole = new \common\models\Assignroledetail();
                $deptrole->departmentid = $id;
                $deptrole->roleid = $_POST['Assignroles']['roleid'];
                $deptrole->assignid =$model->recid ;
               if($deptrole->save())
               {
                  //echo "ok";
                  //return;
               }
            } 
            }else{
             \common\models\Assignroledetail::deleteAll(['assignid'=>$model->recid]);
                $deptrole = new \common\models\Assignroledetail();
                $deptrole->departmentid = $_POST['Assignroles']['departmentid'];
                $deptrole->roleid = $_POST['Assignroles']['roleid'];
                $deptrole->assignid =$model->recid ;
               if($deptrole->save())
               {
                  //echo "ok";
                  //return;
               }
            }
            
            
            return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assignroles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //echo var_dump($_POST['menu']);
            if(!empty($_POST['menu'])){
                $dept = $_POST['menu'];
            }else{
                 $dept = null;
            }
            
            if(count($dept) >0 && $_POST['Assignroles']['roleid']==1)
            {
                \common\models\Assignroledetail::deleteAll(['assignid'=>$model->recid]);
               foreach ($dept as $id){
                $deptrole = new \common\models\Assignroledetail();
                $deptrole->departmentid = $id;
                $deptrole->roleid = $_POST['Assignroles']['roleid'];
                $deptrole->assignid =$model->recid ;
               if($deptrole->save())
               {
                  //echo "ok";
                  //return;
               }
            } 
            }else{
             \common\models\Assignroledetail::deleteAll(['assignid'=>$model->recid]);
                $deptrole = new \common\models\Assignroledetail();
                $deptrole->departmentid = $id;
                $deptrole->roleid = $_POST['Assignroles']['roleid'];
                $deptrole->assignid =$model->recid ;
               if($deptrole->save())
               {
                  //echo "ok";
                  //return;
               }
            }
           
           return $this->redirect(['view', 'id' => $model->recid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Assignroles model.
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
     * Finds the Assignroles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assignroles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assignroles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
