<?php
 use yii\widgets\Pjax;
?>

<?php 

foreach ($model as $data){
   $jobid = $data->recid;
   $jobdate = $data->jobdate;
   // $requser = $data->user;
    $comment = $data->comment;
}
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <p>รายละเอียดใบงาน</p>
    </div>
    <form id="form1">
    <table >
        <tr>
            <td style="padding-left: 10px;"><p>เลขที่ : <?=$jobid;?></p></td>
            <td></td>
            <td></td>
        </tr>
     <tr>
            <td style="padding-left: 10px;"><p>วันที่ : <?=$jobdate;?> </p></td>
            <td></td>
            <td></td>
        </tr>
             <tr>
            <td style="padding-left: 10px;"><p>ผู้แจ้ง/ร้องขอ : 00001</p></td>
            <td></td>
            <td></td>
        </tr>
       <tr>
           <td style="padding-left: 10px;"><p>รายละเอียด : <?=$comment;?></p></td>
            <td></td>
            <td></td>
        </tr>

    </table>
         </form>
</div>

