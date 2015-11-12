<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dasboarddetail */

$this->title = 'Create Dasboarddetail';
$this->params['breadcrumbs'][] = ['label' => 'Dasboarddetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dasboarddetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
