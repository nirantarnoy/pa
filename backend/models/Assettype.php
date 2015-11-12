<?php
namespace backend\models;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Assettype extends \common\models\Assettypes {
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ],
                'value'=> new Expression('NOW()')
            ]
        ];
    }
}
