<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Requser */

$this->title = 'แก้ไขใบสั่งงานเลขที่ : ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'ร้องขอผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requser-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
