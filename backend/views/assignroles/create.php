<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Assignroles */

$this->title = 'เพิ่ม Assignroles';
$this->params['breadcrumbs'][] = ['label' => 'Assignroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignroles-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
