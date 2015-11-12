<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqdevice */

$this->title = 'กรอกข้อมูลร้องขอุปกรณ์คอมพิวเตอร์';
$this->params['breadcrumbs'][] = ['label' => 'ร้องขออุปกรณ์คอมพิวเตอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqdevice-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
