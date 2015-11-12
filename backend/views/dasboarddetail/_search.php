<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DasboarddetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dasboarddetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recid') ?>

    <?= $form->field($model, 'jobtype') ?>

    <?= $form->field($model, 'jobtitle') ?>

    <?= $form->field($model, 'jobaction') ?>

    <?= $form->field($model, 'jobdate') ?>

    <?php // echo $form->field($model, 'aproveddate') ?>

    <?php // echo $form->field($model, 'requestby') ?>

    <?php // echo $form->field($model, 'approvedby') ?>

    <?php // echo $form->field($model, 'jobstatus') ?>

    <?php // echo $form->field($model, 'startdate') ?>

    <?php // echo $form->field($model, 'enddate') ?>

    <?php // echo $form->field($model, 'operateby') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'jobformat') ?>

    <?php // echo $form->field($model, 'jobcondition') ?>

    <?php // echo $form->field($model, 'attachfile') ?>

    <?php // echo $form->field($model, 'filetype') ?>

    <?php // echo $form->field($model, 'usdef1') ?>

    <?php // echo $form->field($model, 'usdef2') ?>

    <?php // echo $form->field($model, 'usdef3') ?>

    <?php // echo $form->field($model, 'usdef4') ?>

    <?php // echo $form->field($model, 'usdef5') ?>

    <?php // echo $form->field($model, 'usdef6') ?>

    <?php // echo $form->field($model, 'usdef7') ?>

    <?php // echo $form->field($model, 'usdef8') ?>

    <?php // echo $form->field($model, 'usdef9') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
