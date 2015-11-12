<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Camel Paperless Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
   
    <div class="row">
        <div class="col-lg-5">
            <div class="pull-right">
               <h2><?= Html::encode($this->title) ?></h2>

    <p>Please fill out the following fields to login:</p>
    
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
       
            </div>
           
        </div>
         <div class="col-lg-1"></div>
           <div class="col-lg-5" style="margin-top: 40px;">
           
     <div class="panel panel-default">
                 <div class="panel-heading"><h4>โปรดอ่านสักนิด</h4></div>
                 <div class="panel-body">
                      <p> กรณีใบใสั่งงานที่ต้องมีการอนุมัติบางหัวข้อ ให้พิจารณาของความสำคัญของเรื่องนั้นๆก่อนว่าต้องให้ผู้บังคับบัญชาอนุมัติหรือไม่ ถึงแม้จะเป็นหัวข้อที่ต้อง
    อนุมัติก็ตาม ตัวอย่างเช่น เปิดคอมพิวเตอร์ไม่ติด,เครื่องปริ้นเตอร์ปริ้นไม่ได้ เป็นต้น ให้เอาเครื่องหมายถูกที่ช่อง  "ต้องอนุมัติ" ออก แต่กรณีต้องการซื้อหรือเปลี่ยนอุปกรณ์ใหม่ที่ต้องผ่านการอนุมัติก่อน
                      ต้องติ๊กถูกที่ช่อง "อนุมัติ" ด้วยทุกครั้ง</p>
                 </div>
             </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <br/>
    
    <div class="row">
        <div class="col-lg-1">
            
        </div>
         <div class="col-lg-10">
            
             
        </div>
         <div class="col-lg-1">
            
        </div>
           
        
         
    </div>
</div>
