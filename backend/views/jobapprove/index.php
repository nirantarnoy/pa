<?php
use yii\bootstrap\ActiveForm;
use yii\web\Session;

$session = new Session();
$session->open();

?>

<?php $form = ActiveForm::begin(['action'=>'index.php?r=jobapprove/approveprocess']); ?>
<?php if(!empty($session->getFlash('msg'))):?>
<div class="alert alert-error">
    <?= $session->getFlash('msg');?>
</div>
<?php endif;?>
   <?php if(!empty($session->getFlash('msgstatus'))):?>
<div class="alert alert-error">
    <?=$session->getFlash('msgstatus'); ?>
   
</div>

<?php else: ?>
  <?php //if(isset($session['recid'])):?>
    <!-- <div class="alert alert-danger"><?php var_dump($session['recid'])?></div>-->
    <?php //endif;?>
     
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <button type="submit" id="btnapp" value="" class="btn btn-primary">อนุมัติ</button>
    </div>

<?php endif;?>
  
    <?php ActiveForm::end(); ?>


