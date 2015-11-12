<?php
namespace backend\Models;

class Changepwd extends \common\models\User{
    public $currentpwd;
    public $newpwd;
    public $confirmpwd;
    
    public function rules() {
           return[
                [['currentpwd','newpwd','confirmpwd'],'required'],
                [['currentpwd'],'validateCurrentPassword'],
                [['newpwd','confirmpwd'],'filter','filter'=>'trim'],
                [['confirmpwd'],'compare','compareAttribute'=>'newpwd','message'=>'รัหสผ่านไม่ตรงกัน'],
            ]; 
    }
    public function attributeLabels() {
        return[
            'currentpwd'=>'รหัสผ่านเก่า',
            'newpwd'=>'รหัสผ่านใหม่',
            'confirmpwd'=>'ยืนยันรหัสผ่าน'
        ];
    }
}
