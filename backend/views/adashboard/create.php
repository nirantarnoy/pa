<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adashboard */

$this->title = 'Create Adashboard';
$this->params['breadcrumbs'][] = ['label' => 'Adashboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adashboard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
