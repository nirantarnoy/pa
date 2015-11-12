<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Organize */

$this->title = 'ข้อมูลองค์กร: ';
$this->params['breadcrumbs'][] = ['label' => 'Organizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recid, 'url' => ['view', 'id' => $model->recid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organize-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
