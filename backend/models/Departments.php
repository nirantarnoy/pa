<?php
namespace backend\models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
class Departments extends \common\models\Departments {
    //put your code here
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=> \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ActiveRecord::EVENT_BEFORE_INSERT=>'updatedate',
                    ],
                'value'=>new Expression('NOW()'),
                
            ]
            
        ];
    }
}
