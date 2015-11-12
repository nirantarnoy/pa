<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqstore */

$this->title = 'กรอกร้องขอกู้คืนขอมูล';
$this->params['breadcrumbs'][] = ['label' => 'ร้องขอกู้คืนข้อมูล', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqstore-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
