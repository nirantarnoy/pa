<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Usergroups */

$this->title = 'แก้ไขกลุ่มผู้ใช้งาน: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usergroups-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
