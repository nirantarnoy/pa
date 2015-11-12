<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Assettype */

$this->title = 'กรอกข้อมูลประเภทอุปกรณ์';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทอุปกรณ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assettype-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
