<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqreport */

$this->title = 'ใบสั่งงานเลขที่ '. $model->recid;
$this->params['breadcrumbs'][] = ['label' => 'Reqreports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqreport-view">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->recid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->recid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recid',
            'jobtype',
            'jobtitle',
            'jobaction',
            'jobdate',
            'aproveddate',
            'requestby',
            'approvedby',
            'jobstatus',
            'startdate',
            'enddate',
            'operateby',
            'comment:ntext',
            'jobformat',
            'jobcondition',
           // 'attachfile',
            [
                'attribute'=>'attachfile',
                 'format'=>'raw',
                'value'=> Html::a($model->attachfile,\yii\helpers\Url::to('../../uploads/reports/'.$model->attachfile),['target'=>'_blank'])
                ,
            ],
            'filetype',
            'usdef1',
            'usdef2',
            'usdef3',
            'usdef4',
            'usdef5',
            'usdef6',
            'usdef7',
            'usdef8',
            'usdef9',
        ],
    ]) ?>

</div>
