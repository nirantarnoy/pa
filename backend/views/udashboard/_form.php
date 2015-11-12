<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Udashboard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="udashboard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobtype')->textInput() ?>

    <?= $form->field($model, 'jobtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jobaction')->textInput() ?>

    <?= $form->field($model, 'jobdate')->textInput() ?>

    <?= $form->field($model, 'aproveddate')->textInput() ?>

    <?= $form->field($model, 'requestby')->textInput() ?>

    <?= $form->field($model, 'approvedby')->textInput() ?>

    <?= $form->field($model, 'jobstatus')->textInput() ?>

    <?= $form->field($model, 'startdate')->textInput() ?>

    <?= $form->field($model, 'enddate')->textInput() ?>

    <?= $form->field($model, 'operateby')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jobformat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jobcondition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachfile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filetype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usdef9')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
