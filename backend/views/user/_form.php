<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?php 
    $groups = new backend\models\Usergroups();
    $dept = new backend\models\Departments();
    $role=new backend\models\Roles();
    ?>
    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

  
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

  
    <?= $form->field($model, 'groupid')->dropDownList(ArrayHelper::map($groups->find()->all(),'recid','groupname')) ?>

    <?= $form->field($model, 'departmentid')->dropDownList(ArrayHelper::map($dept->find()->all(), 'recid', 'departmentname')) ?>
    <?php //echo $form->field($model, 'roleid')->dropDownList(ArrayHelper::map($role->find()->all(), 'recid', 'rolename'), ['class' => 'form-control', 'style' => 'width:200px;']) ?>
      <br />

     <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

    <?php ActiveForm::end(); ?>

</div>
