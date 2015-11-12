<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adashboard */

$this->title = 'รายละเอียด';
$this->params['breadcrumbs'][] = ['label' => 'Dashboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adashboard-view">

    <h3>ใบสั่งงานเลขที่ :: <?= $model->recid ?></h3>

    <p>
        <?= Html::a('ปิดใบสั่งงาน', ['update', 'id' => $model->recid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('แจ้งใบสั่งงานมีปัญหา', ['update', 'id' => $model->recid], ['class' => 'btn btn-warning']) ?>
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
             'comment:ntext',
            'jobstatus',
            'startdate',
            'enddate',
            'operateby',
           
            'jobformat',
            'jobcondition',
          //  'attachfile',
            [
                'attribute'=>'attachfile',
                'format'=>'raw',
                'value'=>Html::a($model->attachfile, \yii\helpers\Url::to('../../uploads/reports/'.$model->attachfile),array('class'=>'button','target'=>'_blank')), 
               
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
