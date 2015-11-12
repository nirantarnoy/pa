<?php
use yii\bootstrap\ActiveForm;

?>
<div class="form-group">
        <?php $form = ActiveForm::begin(['action'=>'index.php?r=jobclose/endjob'])?>
    <input type="radio" class="radio-inline form-group" value="1" name="closetype" checked> ดำเนินการได้
    <input type="radio" class="radio-inline" value="2" name="closetype"> ไม่สามารถกำเนินการได้
    <br /><br />
    <textarea name="rem" class="form-control" rows="5">
    
</textarea>
    <br />
<input type="submit" value="บันทึก" class="btn btn-primary">
<?php ActiveForm::end()?>

   
  
</div>

