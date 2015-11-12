<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\web\Session;
use yii\widgets\LinkPager;
use scotthuangzl\googlechart\GoogleChart;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

$session = new Session();
$session->open();
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UdashboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="udashboard-index">
    <div class="row">
        <div class="box">
            <div class="box-header">
                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    </ul>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=1">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-tasks"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Software</span>
                                    <span class="progress-description">
                                        แจ้งปัญหาข้อมูลและโปรแกรมคอมพิวเตอร์
                                    </span>
                                    <span class="info-box-number"><?= $programactive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=2">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="progress-description">
                                        ร้องขอผู้ใช้งาน
                                    </span>
                                    <span class="info-box-number"><?= $useractive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=3">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-record"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Reports</span>
                                    <span class="progress-description">
                                        ร้องขอรายงาน
                                    </span>
                                    <span class="info-box-number"><?= $reportactive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=4">
                            <div class="info-box bg-black">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-print"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Devices</span>
                                    <span class="progress-description">
                                        ร้องขอคอมพิวเตอร์และอุปกรณ์
                                    </span>
                                    <span class="info-box-number"><?= $deviceactive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=5">
                            <div class="info-box bg-gray-active">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-camera"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">CCTV</span>
                                    <span class="progress-description">
                                        ร้องขอกล้องวงจรปิด
                                    </span>
                                    <span class="info-box-number"><?= $cameraactive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="index.php?r=adashboard/showjob&type=6">
                            <div class="info-box bg-fuchsia">
                                <span class="info-box-icon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Telephone</span>
                                    <span class="progress-description">
                                        ร้องขอ/แจ้งปัญหาโทรศัพท์
                                    </span>
                                    <span class="info-box-number"><?= $phoneactive; ?></span>

                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a <a href="index.php?r=adashboard/showjob&type=7">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="glyphicon glyphicon-retweet"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Restore data</span>
                                        <span class="progress-description">
                                            ร้องขอกู้คืนข้อมูล
                                        </span>
                                        <span class="info-box-number"><?= $restoreactive; ?></span>

                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </a>
                    </div>
                    <div class="col-lg-3">

                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
   
    <div class="row">
        <?php Pjax::begin() ?>   
        <div class="col-lg-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">รายการใบสั่งงาน  <span class="badge bg-yellow-active">
                            <?php if (!empty($session->getFlash('msg'))): ?>
                                <?= $session->getFlash('msg'); ?>
                            <?php else:?>
                                All
                            <?php endif; ?></span> </h3>
                    <div class="box-tools">
                        <ul class="pagination pagination-sm no-margin pull-right">

                        </ul>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">

                    <?php
                    Modal::begin([
                        'header' => '',
                        'id' => 'modal',
                        // 'data-backdrop'=>false,
                        'size' => 'md_lg',
                        'options' => ['data-backdrop' => 'static',
                        ],
                            // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
                    ]);
                    echo "<div id='showmodal'></div>";
                    ?>

                    <?php Modal::end() ?> 

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'layout' => "{summary}\n{items}\n{pager}",
                        'id' => 'gridId',
                        'panel' => [
                            'type' => GridView::TYPE_SUCCESS,
                            'heading' => $this->render('_search', ['model' => $searchModel]),
                        ],
                        'toolbar' => [
                            ['content' => Html::button('ปิดใบสั่งงาน', ['value' => \yii\helpers\Url::to(['/jobclose/niran']), 'class' => 'btn btn-primary', 'id' => 'btnclosejob'])],
                            ['content' => Html::button('&nbspพิมพ์รายงาน', ['value' => \yii\helpers\Url::to(['/jobapprove/index']), 'class' => 'glyphicon glyphicon-print btn btn-default', 'id' => 'btnprint'])],
                            '{toggleData}', '{export}',
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn',
                                'header' => 'No',
                                'headerOptions' => ['style' => 'text-align: center'],
                                'contentOptions' => ['style' => 'text-align: center']
                            ],
                            [
                                'class' => 'yii\grid\CheckboxColumn',
                                'checkboxOptions' => function($model) {
                                    return ['value' => \yii\helpers\ArrayHelper::getValue($model, 'recid'),
                                        'checked' => false,
                                        'onClick' => ''
                                        . 'if(this.checked){'
                                        . 'this.parentElement.parentElement.style.backgroundColor="#CCFFCC";'
                                        . '}'
                                        . 'else{'
                                        . 'this.parentElement.parentElement.style.backgroundColor="white";'
                                        . '}'
                                    ];
                                },
                                    ],
                                    // 'recid',
                                    'jobtype',
                                    'comment',
                                    'jobdate',
                                    //'aproveddate',
                                    'requestby',
                                    //'jobstatus',
                                    [
                                        'class' => '\kartik\grid\DataColumn',
                                        'attribute' => 'jobstatus',
                                        'value' => function($data) {
                                            return 1 > 0 ? 'Open' : '';
                                        },
                                    ],
                                    [

                                        'header' => '',
                                        'headerOptions' => ['style' => 'width: 160px;text-align:center;', 'class' => 'activity-view-link',],
                                        'class' => 'yii\grid\ActionColumn',
                                        'contentOptions' => ['style' => 'text-align: right'],
                                        'buttons' => [
                                            'view' => function($url, $data, $index) {
                                                $options = [
                                                    'title' => Yii::t('yii', 'View'),
                                                    'aria-label' => Yii::t('yii', 'View'),
                                                    'data-pjax' => '0',
                                                ];
                                                return Html::a('<span class="glyphicon glyphicon-eye-open btn btn-default"></span>', '#', 
                                                        ['class'=>'btn_showjob',
                                                         'data-pjax' => '0',
                                                         'data-key'=>$data->recid,
                                                         'data-id'=>'index.php?r=jobpreview/showjob',
                                                         ]
                                                        );
                                            },
                                                    'update' => function($url, $data, $index) {
                                                $options = array_merge([
                                                    'title' => Yii::t('yii', 'Update'),
                                                    'aria-label' => Yii::t('yii', 'Update'),
                                                    'data-pjax' => '0',
                                                    'id' => 'modaledit',
                                                    'visible' => false,
                                                ]);
                                                return 1 > 2 ? Html::a('<span class="glyphicon glyphicon-pencil btn btn-default"></span>', $url, [
                                                            'id' => 'activity-view-link',
                                                            //'data-toggle' => 'modal',
                                                            // 'data-target' => '#modal',
                                                            'data-id' => $index,
                                                            'data-pjax' => '0'
                                                        ]) : '';
                                            },
                                                    'delete' => function($url, $data, $index) {
                                                $options = array_merge([
                                                    'title' => Yii::t('yii', 'Delete'),
                                                    'aria-label' => Yii::t('yii', 'Delete'),
                                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                    'data-method' => 'post',
                                                    'data-pjax' => '0',
                                                ]);
                                                return 1 > 2 ? Html::a('<span class="glyphicon glyphicon-trash btn btn-default"></span>', $url, $options) : '';
                                            }
                                                ]
                                            ],
                                        ],
                                    ]);
                                    ?>    

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <div class="col-lg-3">

                            <div class="small-box bg-green-gradient">
                                <div class="inner">
                                    <div style="text-align: center;">
                                        <p style="text-align: right;"><h2>รวมทั้งหมด</h2></p>
                                        <h2><?= $alljob; ?></h2>
                                    </div>

                                </div>
                                <div class="icon">
                                  <!--<i class="glyphicon glyphicon-ban-circle"></i>-->
                                </div>
                                <a href="index.php?r=adashboard/index" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
                            </div>




                        </div>
                        <?php Pjax::end() ?>   
                    </div>








                </div>
                <?php $this->registerJs('
    $(function(){
        
$(".btn_showjob").click(function(){
  var recid = $(this).closest("tr").data("key");
       var Url = "' . \yii::$app->getUrlManager()->createUrl('jobpreview/createid') . '";
           
  $.ajax({
            type:"post",
            dataType: "html",
            url: Url,
            data:{pk: recid},
            success: function(data){
//                    $(".modal-body").html(data);
//                    $("#modal").modal();    

                },
            error: function(data)
            {
                alert("fail");
            }
        });
        
$("#modal").modal("show").find("#showmodal").load($(this).attr("data-id"));
  });

 $("#btnclosejob").click(function(){

 var recid = $("#gridId").yiiGridView("getSelectedRows");
        var Url = "' . \yii::$app->getUrlManager()->createUrl('jobclose/createid') . '";//$(this).attr("value");
       
if(recid < 1){
  alert("คุณยังไม่เลือกรายการใดๆ");
  return;
}

//if(recid.length > 1){
//  alert("สามารถเลือกรายการที่ต้องการอนุมัติได้ทีละ 1 รายการ");
//  return;
//}
 
       // confirm("คุณต้องการอนุมัติใบงานนี้ใช่หรือไม่");
      // alert(recid);
        $.ajax({
            type:"post",
            dataType: "html",
            url: Url,
            data:{pk: recid , module: "adashboard"},
            success: function(data){
                    // alert("ss"); 
                    
                },
            error: function(data)
            {
                alert("fail");
            }
        });
    $("#modal").modal("show").find("#showmodal").load($(this).attr("value"));
 });
         
    });
   


'); ?>