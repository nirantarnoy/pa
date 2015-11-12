<?php

use kartik\alert\AlertBlock;

/* @var $this \yii\web\View */
/* @var $content string */

if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }
?>
 <?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title></title>
  
</head>
<body>
    <?= $content ?>
   
</body>
</html>
  <?php $this->endPage() ?>
