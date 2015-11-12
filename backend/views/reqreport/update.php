<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqreport */

$this->title = 'แก้ไขใบสั่งงานเลขที่ : ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'ร้องขอรายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reqreport-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
