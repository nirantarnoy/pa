<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqtelephone */

$this->title = 'แก้ไขใบสั่งงานเลขที่ : ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'แจ้งปัญหาโทรศัพท์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reqtelephone-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
