<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Assettype;
use backend\models\Assets;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdevice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reqdevice-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php $devicetype = new Assettype();?>
    <?php $device = new Assets();?>
    <label>ประเภทอุปกรณ์</label>
    <?= $form->field($model, 'usdef1')->dropDownList(ArrayHelper::map($devicetype->find()->all(), 'recid', 'typename'),
    [
        'prompt'=>'เลือกประเภท',
        'onchange'=>'
         $.ajax({
         type: "post",
         url: "index.php?r=reqdevice/showdevice&id=" +$(this).val(),
         data:{},
         //dataType: "json",
         contentType: "application/json; charset=utf-8",
         success: function(data) {
           $("#devicelist").html(data);
          },
         error: function(data){
            alert("fail");
         }
         });
'
        ,
        'class'=>'form-control',
        
        ])->label(false)?>
    <label>รหัสอุปกรณ์</label>
    <?= $form->field($model, 'usdef2')->dropDownList(ArrayHelper::map($device->find()->all(), 'recid', 'assetname'),
    [
        'prompt'=>'เลือกอุปกรณ์',
        'id'=>'devicelist',
        ]
            )->label(false);?>
   
    
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'isapprove')->checkbox();?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
