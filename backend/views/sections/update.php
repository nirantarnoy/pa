<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sections */

$this->title = 'แก้ไขฝ่าย: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sections-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
