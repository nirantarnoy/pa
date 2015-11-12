<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Jobtitles;
use common\models\Jobactions;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Requser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requser-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $title = new Jobtitles();?>
    <?php $jobaction = new Jobactions();?>
      <?php $sublist = [['id'=>1,'value'=>'ลาออก'],['id'=>2,'value'=>'ย้ายตำแหน่ง']];?>
    <div class="row">
        <div class="col-lg-4">
    <label>ประเภทการร้องขอ</label>
    <?= $form->field($model, 'jobtitle')->dropDownList(
 ArrayHelper::map($title->find()->where(['type'=>1])->all(), 'recid', 'titlename'),['id'=>'jobtitle','style'=>'width: 300px;']
            )->label(false)?>
        </div>
          <div class="col-lg-4">
              <label>วัตถุประสงค์</label>
            <?= $form->field($model, 'jobaction')->dropDownList(
 ArrayHelper::map($jobaction->find()->all(), 'recid', 'actionname'),['id'=>'jobaction','style'=>'width: 300px;']
            )->label(false)?>
        </div>
          <div class="col-lg-4">
              <label>เนื่องจาก</label>
             <?= $form->field($model, 'comment')->dropDownList(
 ArrayHelper::map($sublist, 'id', 'value'),['id'=>'typelist','style'=>'width: 300px;']
            )->label(false)?>
        </div>
    </div>
    
    

    
    
   

   
   
<label>ชื่อ - นามสกุล(ภาษาไทย)</label>
    <?= $form->field($model, 'usdef1')->textInput(['style'=>'width: 500px;'])->label(false) ?>
<label>ชื่อผู้ใช้(ภาษาอังกฤษ)</label>
    <?= $form->field($model, 'usdef2')->textInput(['style'=>'width: 500px;'])->label(false) ?>
<label>นามสกุล(ภาษาอังกฤษ)</label>
    <?= $form->field($model, 'usdef3')->textInput(['style'=>'width: 500px;'])->label(false) ?>
<label>username</label>
    <?= $form->field($model, 'usdef4')->textInput(['style'=>'width: 500px;'])->label(false) ?>
<label>password</label>
    <?= $form->field($model, 'usdef5')->textInput(['style'=>'width: 500px;'])->label(false) ?>
<label>ตำแหน่งงาน</label>
    <?= $form->field($model, 'usdef6')->textInput(['maxlength' => true])->label(false) ?>
<label>ความรับผิดชอบ</label>
    <?= $form->field($model, 'usdef7')->textInput(['maxlength' => true])->label(false) ?>

   <label>ชื่อพนักงานที่ลาออก หรือ ย้ายตำแหน่ง</label>
    <?= $form->field($model, 'usdef8')->textInput(['maxlength' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs('
    $(function(){
            $("#jobaction").attr("disabled","disabled");
            $("#typelist").attr("disabled","disabled");    

      $("#jobtitle").change(function(){
        $itemselect = $(this).val();
        //alert($itemselect);
        if($itemselect == 2)
        {
            $("#jobaction").attr("disabled","disabled");
            $("#typelist").attr("disabled","disabled");
        }
        else{
         $("#jobaction").removeAttr("disabled");
        }
      });
      
      $("#jobaction").change(function(){
       $itemselect = $(this).val();
         if($itemselect == 1)
        {
            $("#typelist").attr("disabled","disabled");
        }
        else{
         $("#typelist").removeAttr("disabled");
        }
      });
    });
');?>