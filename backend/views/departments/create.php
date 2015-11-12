<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Departments */

$this->title = 'เพิ่มข้อมูลแผนก';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลแผนก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
