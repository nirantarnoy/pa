<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReqprogramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งปัญหาข้อมูลโปรแกรมคอมพิวเตอร์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqprogram-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Reqprogram', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php    Modal::begin([
         'header' => 'ทำรายการ',
                'id' => 'modal',
                // 'data-backdrop'=>false,
                'size' => 'md_lg',
                'options' => ['data-backdrop' => 'static',
                    ],
               // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
    ]);
    echo  "<div id='showmodal'></div>";
    ?>
   
    <?php    Modal::end()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'id'=>'gridId',
        'panel'=>[
             'type'=>GridView::TYPE_SUCCESS,
            'heading'=>$this->render('_search', ['model' => $searchModel]),
        ],
        'toolbar'=>[
              ['content'=>Html::a('สร้างใหม่', ['create'], ['class' => 'btn btn-primary'])],
             ['content' => $_SESSION['groupid']==1? Html::button('ปิดใบสั่งงาน',['value'=>\yii\helpers\Url::to(['/jobclose/index']),'class' => 'btn btn-warning','id' => 'btnjobclose']):''],
            '{toggleData}',$_SESSION['groupid']==1?'{export}':'',
        ]
        ,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'No',
               'headerOptions' => ['style' => 'text-align: center'],
                'contentOptions' => ['style' => 'text-align: center']
                ],
 [
                'class' => 'yii\grid\CheckboxColumn',
                 'visible'=> 1>0 ? true:false,
                'checkboxOptions' => function($model) {
                    return ['value' => \yii\helpers\ArrayHelper::getValue($model, 'recid'),
                        'checked' => false];
                }],
          //  'recid',
           // 'jobtype',
            'jobtitle',
           // 'jobaction',
            'jobdate',
            // 'aproveddate',
            // 'requestby',
            // 'approvedby',
            // 'jobstatus',
             [
                 'attribute'=>'jobstatus',
                 'value'=>function($data){
                   return $data->jobstatus == 1?'Open':$data->jobstatus == 2?'Approved':'Closed';
                 }
             ],
            // 'startdate',
            // 'enddate',
            // 'operateby',
             'comment:ntext',

            [

                'header' => 'Action',
                'headerOptions' => ['style' => 'width: 160px;text-align:center;','class' => 'activity-view-link',],
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align: center'],
                'buttons' => [
                    'view' => function($url, $data, $index) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a(
                                        '<span class="glyphicon glyphicon-eye-open btn btn-default"></span>', $url, $options);
                    },
                        'update' => function($url, $data, $index) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'id'=>'modaledit',
                        ]);
                        return $data->jobstatus == 1? Html::a(
                                                '<span class="glyphicon glyphicon-pencil btn btn-default"></span>', $url, [
                                            'id' => 'activity-view-link',
                                            //'data-toggle' => 'modal',
                                            // 'data-target' => '#modal',
                                            'data-id' => $index,
                                            'data-pjax' => '0',
                                           // 'style'=>['float'=>'rigth'],
                                ]):'';
                    },
                            'delete' => function($url, $data, $index) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                                ]);
                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-default"></span>', $url, $options);
                    }
                        ]
                    ],
        ],
    ]); ?>

</div>
<?php $this->registerJs(
        '  
            $(function(){
                $("#btnjobclose").click(function(){
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
       alert(recid);
        $.ajax({
            type:"post",
            dataType: "json",
            url: Url,
            data:{pk: recid , module: "program"},
            success: function(data){
                   //  alert("ss"); 
                    
                }
        });
    $("#modal").modal("show").find("#showmodal").load($(this).attr("value"));
 });
            });
        '
       );?>
<div class="pagename"  <?php echo "id=$pagename"; ?>></div>
<?php 
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/leftmenu.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>
