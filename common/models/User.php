<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\models\Usergroups;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $groupid
 * @property integer $departmentid
 * @property integer $roleid
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $password;
//    public $currentpwd;
//    public $newpwd;
//    public $confirmpwd;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
public function behaviors() {
      return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'username', 'auth_key', 'password_hash', 'email', 'groupid', 'departmentid','roleid'], 'required'],
            [['status', 'created_at', 'updated_at', 'groupid', 'departmentid', 'roleid'], 'integer'],
            [['fname', 'lname', 'username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password'],'string'],
            [['username'],'unique'],
//            [['currentpwd','newpwd','confirmpwd'],'required'],
//            [['currentpwd'],'validateCurrentPassword'],
//            [['newpwd','confirmpwd'],'filter','filter'=>'trim'],
//            [['confirmpwd'],'compare','compareAttribute'=>'newpwd','message'=>'รัหสผ่านไม่ตรงกัน'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'groupid' => 'กลุ่มผู้ใช้',
            'departmentid' => 'แผนก',
            'roleid' => 'Role',
//            'currentpwd'=>'รหัสผ่านเก่า',
//            'newpwd'=>'รหัสผ่านใหม่',
//            'confirmpwd'=>'ยืนยันรหัสผ่าน'
            
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    
    public function validateCurrentPassword()
    {
       // $this->addError("currentpwd","nooo");
//        if(!$this->validatePassword('23')){
//            $this->addError('currentpwd', 'รหัสผ่านเก่าไม่ถูกต้อง');
//        }
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function getGroup()
    {
        return $this->hasOne(Usergroups::className(), ['recid'=>'groupid']);
    }
    public function getDepartment()
    {
        return $this->hasOne(\backend\models\Departments::className(), ['recid'=>'departmentid']);
    }
}
