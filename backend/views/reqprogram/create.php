<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqprogram */

$this->title = 'แจ้งปัญหาโปรแกรมคอมพิวเตอร์';
$this->params['breadcrumbs'][] = ['label' => 'Reqprograms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqprogram-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
