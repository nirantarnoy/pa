<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Departmentrole */

$this->title = 'Create Departmentrole';
$this->params['breadcrumbs'][] = ['label' => 'Departmentroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departmentrole-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
