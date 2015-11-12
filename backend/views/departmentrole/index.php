<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentroleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departmentroles';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php    
       ActiveForm::begin(['id'=>'myform','action'=>'index.php?r=departmentrole/assignrole'])?>
      
       <div class="form-group">
           
           <table style="width: 100%;" class="table"> 
                            <?php foreach ($model as $data):?>
                            <tr>
                                <td style="width: 10%;"> <input type='checkbox' name="menu[]" class="flat-red"/> 
                                <td style="width: 20%;"> <?=$data->departmentname?></td>
                                <td style="width: 50%;"><?=$data->description?></td>
                            </tr>
                            <?php endforeach;?>  
                       
                          
                        </table>
                
           
              <span class="input-group">                 
              <button type='submit' name='search' id='search-btn' class="btn btn-flat">บันทึก
              </button> 
              </span>
        </div>
<?php   ActiveForm::end();?>
