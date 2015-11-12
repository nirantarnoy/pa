<?php
namespace backend\models;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
class Assignroles extends \common\models\Assignroles{
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
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id'=>'userid']);
    }
     public function getFullname()
    {
        return $this->Users->fname;
    }
    public function attributeLabels() {
       return array_merge( parent::attributeLabels(),[
           'fullname'=>  \Yii::t('app', 'full name'),
       ]);
    }
}
