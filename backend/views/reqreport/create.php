<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqreport */

$this->title = 'กรอกร้องขอรายงาน';
$this->params['breadcrumbs'][] = ['label' => 'ร้องขอรายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqreport-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
