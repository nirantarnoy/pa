<?php
namespace backend\models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
class Reqcamera extends \common\models\Jobs {
     public function behaviors() {
         return[
             'timestamp'=>[
               'class'=>  \yii\behaviors\AttributeBehavior::className(),
               'attributes'=>[
               ActiveRecord::EVENT_BEFORE_INSERT=>'jobdate',
               ],
               'value'=>new Expression('NOW()'),
               ],
             'timpstamp'=>[
                   'class'=>  \yii\behaviors\AttributeBehavior::className(),
               'attributes'=>[
               ActiveRecord::EVENT_BEFORE_INSERT=>'jobtype',
               ],
               'value'=> 5,
               ],
  
       ];
    }
}
