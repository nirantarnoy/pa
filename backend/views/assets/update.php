<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assets */

$this->title = 'แก้ไขอุปกรณ์: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'อุปกรณ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assets-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
