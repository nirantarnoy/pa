<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Jobtitles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqreport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reqreport-form">

    <?php $form = ActiveForm::begin(['id'=>'form-report','options'=>['enctype'=>'multipart/form-data']]); ?>
     
    <?php $jtitle = new Jobtitles();?>
    <label>ประเภทการร้องขอ</label>
    <?= $form->field($model, 'jobtitle')->dropDownList(
 ArrayHelper::map($jtitle->find()->where(['type'=>2])->all(), 'recid', 'titlename')
            )->label(false) ?>

    <label>หัวข้อเรื่อง</label>
    <?= $form->field($model, 'comment')->textInput()->label(false)?>
<label>รูปแบบ</label>
    <?= $form->field($model, 'jobformat')->textInput(['maxlength' => true])->label(false) ?>
<label>เงื่อนไข</label>
    <?= $form->field($model, 'jobcondition')->textInput(['maxlength' => true])->label(false) ?>
<label>ไฟล์แนบ</label>
    <?= $form->field($model, 'attachfile')->fileInput()->label(false) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
