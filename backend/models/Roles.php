<?php
namespace backend\models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
class Roles extends \common\models\Roles{
  public function behaviors() {
        return [
            'timestamp'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
               ActiveRecord::EVENT_BEFORE_UPDATE=>'updatedate',
                ],
                'value'=>new \yii\db\Expression('NOW()'),
            ]
        ];
    }
}