<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqtelephone */

$this->title = 'แจ้งปัญหาโทรศัพท์';
$this->params['breadcrumbs'][] = ['label' => 'แจ้งปัญหาโทรศัพท์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqtelephone-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
