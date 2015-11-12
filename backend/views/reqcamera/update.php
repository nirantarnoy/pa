<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqcamera */

if(count($model->recid)<2)
{
    $xx = '000'.$model->recid;
}

$this->title = 'แก้ไขใบสั่งงานเลขที่ : ' . ' ' . $xx;
$this->params['breadcrumbs'][] = ['label' => 'แจ้งปัญหากล้องวงจรปิด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $xx, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reqcamera-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
