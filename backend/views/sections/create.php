<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sections */

$this->title = 'เพิ่มฝ่าย';
$this->params['breadcrumbs'][] = ['label' => 'ฝ่าย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sections-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
