<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdevice */

$this->title = 'แก้ไขใบสั่งงานเลขที่ : ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'ร้องขออุปกรณ์คอมพิวพเตอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reqdevice-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
