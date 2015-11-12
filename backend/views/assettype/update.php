<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assettype */

$this->title = 'แก้ไขข้อมูลประเภทอุปกรณ์: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทอุปกรณ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assettype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
