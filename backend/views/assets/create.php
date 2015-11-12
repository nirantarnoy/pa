<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Assets */

$this->title = 'เพิ่มอุปกรณ์';
$this->params['breadcrumbs'][] = ['label' => 'อุปกรณ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assets-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
