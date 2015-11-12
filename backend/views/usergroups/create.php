<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Usergroups */

$this->title = 'เพิ่มกลุ่มผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usergroups-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
