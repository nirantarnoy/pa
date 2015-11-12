<?php
namespace backend\models;

class Jobapprove extends \yii\base\Model {
    public $username;
    public $password;
    
    public function rules()
    {
       return[
           [['username','password'],'required'],
           [['username'],'string'],
           [['password'],'string'],
       ];
    }
    public function attributeLabels() {
        return[
            'username'=>'username',
            'password'=>'password',
        ];
    }
}
