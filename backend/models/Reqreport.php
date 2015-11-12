<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\db\Expression;

class Reqreport extends \common\models\Jobs {
    public function behaviors() {
       return[
             'timestamp'=>[
               'class'=>  \yii\behaviors\AttributeBehavior::className(),
               'attributes'=>[
               ActiveRecord::EVENT_BEFORE_INSERT=>'jobdate',
               ],
               'value'=>new Expression('NOW()'),
               ],
           
              'timestamp2'=>[
                  'class'=>  \yii\behaviors\AttributeBehavior::className(),
                  'attributes'=>[
                  ActiveRecord::EVENT_BEFORE_INSERT=>'jobstatus',
                  ],
                  'value'=> 1,
                  
              ],
           
         
              'timestamp3'=>[
               'class'=>  \yii\behaviors\AttributeBehavior::className(),
               'attributes'=>[
               ActiveRecord::EVENT_BEFORE_INSERT=>'jobtype',
               ],
               'value'=> 3,
               ],
           
             
  
       ];
    }
    public function rules() {
      
             return [
            [['jobtitle','jobformat','jobcondition'], 'required'],
            [['comment'],'string'],
        ];
  
    }
}
