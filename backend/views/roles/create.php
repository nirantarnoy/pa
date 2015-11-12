<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Roles */

$this->title = 'เพิ่ม Roles';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
