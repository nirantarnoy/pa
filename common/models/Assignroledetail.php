<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignroledetail".
 *
 * @property integer $recid
 * @property integer $roleid
 * @property integer $departmentid
 */
class Assignroledetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assignroledetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'departmentid','assignid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'roleid' => 'Roleid',
            'departmentid' => 'Departmentid',
            'assignid'=>'Assignid',
        ];
    }
}
