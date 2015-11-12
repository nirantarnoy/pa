<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;

class UserForm extends Model {
    public $id;
    public $fname;
    public $lname;
    public $username;
    public $email;
    public $password;
    public $groupid;
    public $departmentid;
    public $roleid;
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['fname','lname'],'string'],
            [['groupid','departmentid'],'integer'],
            [['id'],'safe'],
            [['roleid'],'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
      
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password=$this->password;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->fname = $this->fname;
            $user->lname = $this->lname;
            $user->groupid = $this->groupid;
            $user->departmentid = $this->departmentid;
            $user->roleid = $this->roleid;
            if ($user->save()) {
                return $user;
            }
            
       }
        return null;
    }
}
