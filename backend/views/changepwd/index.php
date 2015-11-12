<?php

use yii\bootstrap\ActiveForm;
?>

<div class="roles-form">

    <div class="row">
        <div class="col-lg-3">
            
        </div>
     <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id'=>'form1','action'=>'index.php?r=changepwd/doit']); ?>

    <?= $form->field($model, 'currentpwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newpwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirmpwd')->textInput() ?>
    
   
         <input type="submit" class="btn btn-primary" value="ตกลง">
          <?php ActiveForm::end(); ?>
        </div>
     <div class="col-lg-3">
            
        </div>
    </div>
    
</div>

