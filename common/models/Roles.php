<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $recid
 * @property string $rolename
 * @property string $description
 * @property string $createdate
 * @property string $updatedate
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename'], 'required'],
            [['description'], 'string'],
            [['createdate', 'updatedate'], 'safe'],
            [['rolename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'rolename' => 'Rolename',
            'description' => 'Description',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
