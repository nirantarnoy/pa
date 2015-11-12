<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqcamera */

$this->title = 'กรอกข้อมูลแจ้งปัญหากล้อง CCTV';
$this->params['breadcrumbs'][] = ['label' => 'แจ้งปัญหากล้อง CCTV', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqcamera-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
