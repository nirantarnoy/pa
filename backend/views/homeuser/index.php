<?php
//echo"Hello";
use yii\web\Session;
use yii\widgets\LinkPager;
use scotthuangzl\googlechart\GoogleChart;

$session = new Session();
$session->open();

?>
<div class="row">
<!--            <div class="col-lg-3 col-xs-6">
               small box 
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>3</h3>
                  <p>ใบสั่งงานล่าสุด</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-list-alt"></i>
                </div>
                <a href="#" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue-gradient">
                <div class="inner">
                  <h3><?=$approve;?></h3>
                  <p>ใบสั่งงานรออนุมัติ</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-edit"></i>
                </div>
                <a href="index.php?r=dasboarddetail/approval&uid=<?=$session['userid']?>" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?=$problem;?></h3>
                  <p>ใบสั่งงานมีปัญหา</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                </div>
                <a href="index.php?r=dasboarddetail/problem&uid=<?=$session['userid']?>" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green-gradient">
                <div class="inner">
                  <h3><?=$finished;?></h3>
                  <p>ใบสั่งงานดำเนินการล่าสุด</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-check"></i>
                </div>
                  <a href="index.php?r=dasboarddetail/finished&uid=<?=$session['userid']?>" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <br />
          <div class="row">
              <div class="col-lg-6">
                <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">กราฟแสดงจำนวนใบสั่งงาน</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <?php echo GoogleChart::widget(['visualization' => 'PieChart',
                'data' => [
                    ['Task', 'Hours per Day'],
                    ['โปรแกรม', 11],
                    ['รายงาน', 2],
                    ['ผู้ใช้งาน', 2],
                    ['อุปกรณ์คอมฯ', 2],
                    ['CCTV', 7],
                    ['โทรศัพท์', 7],
                    ['กู้ข้อมูล', 7],
                ],
                'options' => ['title' => '',]]);?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
              <div class="col-lg-6">
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">ประวัติการทำรายการ</h3>
                  <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      
                    </ul>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" style="margin-top: 10px">
      <thead>
        <tr>
        
          <th>เลขที่</th>
          <th>เรื่อง</th>
          <th>วันที่ร้องขอ</th>
          <th style="text-align: center;">สถานะ</th>
        
        </tr>
      </thead>
      <tbody>
          <?php foreach ($model as $data):?>
          <tr>
            
              <td><?php echo $data->recid; ?></td>
              <td> <a href="#"><?php echo $data->comment; ?></a></td>
            <td><?php echo Yii::$app->formatter->asDate($data->jobdate, 'dd-MM-yyyy'); ?></td>
            <td style="text-align: center;"><?php if($data->jobstatus ==200): ?>
                <span class="badge bg-green">ดำเนินการแล้ว</span>
                <?php else:?>
                <span class="badge bg-yellow">รอดำเนินการ</span>
                <?php endif;?>
            </td>
           
          </tr>
          <?php          endforeach;?>
      </tbody>
</table>
   <?php echo LinkPager::widget([
        'pagination' => $pages,
      ]); 
    ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
          </div>
          
         
    
           

             