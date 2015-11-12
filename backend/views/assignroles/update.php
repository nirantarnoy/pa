<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignroles */

$this->title = 'แก้ไข Assignroles: ' . ' ' . $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Assignroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assignroles-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
