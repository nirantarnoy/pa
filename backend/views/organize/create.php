<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Organize */

$this->title = 'สร้าง/แก้ไขข้อมูลองค์กร';
$this->params['breadcrumbs'][] = ['label' => 'Organizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organize-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
