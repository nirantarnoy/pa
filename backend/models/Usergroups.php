<?php

namespace backend\models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
class Usergroups extends \common\models\Usergroups {
 public function behaviors() {
        return [
            'timestamp'=>[
                'class'=> \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ],
                'value'=>new \yii\db\Expression('NOW()'),
            ]
        ];
    }
}
