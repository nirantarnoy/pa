<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignroles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assignroles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $user = new common\models\User();?>
    <?php $dept = new common\models\Departments();?>
    <?php $dept2 = \common\models\Departments::find()->all();?>
    <?php
    $dept3count = \common\models\Assignroledetail::find()->where(['assignid'=>$model->recid])->count();
    $dept3 = \common\models\Assignroledetail::find()->where(['assignid'=>$model->recid])->all();
    ?>
    <?php $role = new common\models\Roles();?>
    
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userid')->dropDownList(
 ArrayHelper::map($user->find()->all(), 'id', 'fname')
            ) ?>

    

     <?= $form->field($model, 'departmentid')->dropDownList(
 ArrayHelper::map($dept->find()->all(), 'recid', 'departmentname')
            ) ?>
    <?php //echo $form->field($model, 'createdate')->textInput() ?>
    
     <?= $form->field($model, 'roleid')->dropDownList(
 ArrayHelper::map($role->find()->all(), 'recid', 'rolename'),['id'=>'rolename']
            ) ?>

 <?php Modal::begin([
         'header' => 'ทำรายการ',
                'id' => 'modal',
                // 'data-backdrop'=>false,
                'size' => 'md_lg',
                'options' => ['data-backdrop' => 'static',
                    ],
               // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
    ]);
    echo  "<div id='showmodal'></div>";
    ?>
    <?php    Modal::end()?>
    
    <?php //echo $form->field($model, 'updatedate')->textInput() ?>
    <?php if($dept3count >0 && $model->roleid == 1): 
         
          foreach ($dept3 as $aa) {
              $xx[] = $aa->departmentid;
          }
        ?>
    <div class="panel panel-green" id="showdept">
           
           <table style="width: 100%;" class="table success"> 
                            <?php foreach ($dept2 as $data):?>
                            <tr>
                                <td style="width: 5%;"> <input type='checkbox' name="menu[]" class="flat-red" value="<?=$data->recid?>" <?=in_array($data->recid, $xx)?'checked':''; ?>/> 
                                <td style="width: 10%;"> <?=$data->departmentname?></td>
                                <td style="width: 50%;"><?=$data->description?></td>
                            </tr>
                            <?php endforeach;?>  
                       
                          
                        </table>
                
           
            
        </div>
    <?php endif;?>
    <div class="panel panel-green" id="adddept">
           
           <table style="width: 100%;" class="table success"> 
                            <?php foreach ($dept2 as $data):?>
                            <tr>
                                <td style="width: 5%;"> <input type='checkbox' name="menu[]" class="flat-red" value="<?=$data->recid?>"/> 
                                <td style="width: 10%;"> <?=$data->departmentname?></td>
                                <td style="width: 50%;"><?=$data->description?></td>
                            </tr>
                            <?php endforeach;?>  
                       
                          
                        </table>
                
           
            
        </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs(
        '
            $(function(){
            
             $("#adddept").hide();
             $("select#rolename").change(function(){
             //alert($(this).val());
                if($(this).val()==1)
                {
                     $("#departmentadd").show();
                      $("#adddept").show();
                }
                 else if($(this).val()!=1)
                {
                     $("#departmentadd").hide();
                     $("#adddept").hide();
                     $("#showdept").hide();
                     
                     $("input[type=checkbox]").each(function(){
                       // if($(this).attr("checked","checked")){
                         // alert();
                        //}
                     });
                }
             });
             
            });
         '

);?>
