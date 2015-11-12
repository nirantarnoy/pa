<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DasboarddetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = isset($ptitle)? $ptitle : 'Dasboarddetails';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dasboarddetail-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
   
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
            'id'=>'gridId',
            'columns'=>[
                'recid',
                'comment',
                'jobdate',
                [
                    'attribute'=>'jobstatus',
                    'value'=>function($data){
                        return $data->jobstatus==1? 'Open':'';
                    },
                     'contentOptions'=>[
                         'class'=>'badge bg-green',
                     ]
                ]
            ]
            ]
            );?>
    
    
 
</div>
   <?php $this->registerJs('
    $(function(){
        $("#btnapprove").click(function(){
        //e.preventDefault();
        //alert("OK");
       // var recid = $("#gridId").yiiGridView("getSelectedRows");
        var Url = "' . \yii::$app->getUrlManager()->createUrl('jobapprove/createid') . '";//$(this).attr("value");
     //  alert(recid);
if(recid < 1){
  alert("คุณยังไม่เลือกรายการที่ต้องการอนุมัติ");
  return;
}

if(recid.length > 1){
  alert("สามารถเลือกรายการที่ต้องการอนุมัติได้ทีละ 1 รายการ");
  return;
}

 var dept = $(".departmentjob").attr("id");
       // confirm("คุณต้องการอนุมัติใบงานนี้ใช่หรือไม่");
      // alert(recid);
        $.ajax({
            type:"post",
            dataType: "html",
            url: Url,
            data:{pk: recid , module: "device", department: dept},
            success: function(data){
                    // alert(data); 
                   //  return;
                },
                error: function(data)
                {
                    alert("error");
                }
        });
         
        $("#modal").modal("show").find("#showmodal").load($(this).attr("value"));
       
    });
    
 
         
    });
   
'); ?>