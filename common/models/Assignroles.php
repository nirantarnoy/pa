<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignroles".
 *
 * @property integer $recid
 * @property string $description
 * @property integer $userid
 * @property integer $departmentid
 * @property integer $roleid
 * @property string $createdate
 * @property string $updatedate
 */
class Assignroles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assignroles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['userid', 'departmentid', 'roleid'], 'required'],
            [['userid', 'departmentid', 'roleid'], 'integer'],
            [['createdate', 'updatedate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'description' => 'รายละเอียด',
            'userid' => 'ผู้ใช้งาน',
            'departmentid' => 'แผนก',
            'roleid' => 'Role',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
    public function getDepartment()
    {
        return $this->hasOne(\backend\models\Departments::className(), ['recid'=>'departmentid']);
    }
     public function getRole()
    {
        return $this->hasOne(\backend\models\Roles::className(), ['recid'=>'roleid']);
    }
}
