<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Requser */

$this->title = 'กรอกร้องขอผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'ร้องขอผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requser-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
