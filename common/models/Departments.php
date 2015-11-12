<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $recid
 * @property string $departmentname
 * @property string $description
 * @property integer $sectionid
 * @property string $createdate
 * @property string $updatedate
 *
 * @property Sections $section
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentname', 'sectionid'], 'required'],
            [['description'], 'string'],
            [['sectionid'], 'integer'],
            [['createdate', 'updatedate'], 'safe'],
            [['departmentname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'departmentname' => 'Departmentname',
            'description' => 'Description',
            'sectionid' => 'Sectionid',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Sections::className(), ['recid' => 'sectionid']);
    }
}
