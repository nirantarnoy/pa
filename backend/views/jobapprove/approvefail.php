<?php
use yii\web\Session;
$session = new Session();
$session->open();
?>

<?php if(!empty($session->getFlash('msg'))):?>
<div class="alert alert-error">
    <?= $session->getFlash('msg');?>
</div>
<?php endif;?>
