<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property integer $recid
 * @property string $sectionname
 * @property string $description
 * @property string $createdate
 * @property string $updatedate
 *
 * @property Departments[] $departments
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sectionname'], 'required'],
            [['description'], 'string'],
            [['createdate', 'updatedate'], 'safe'],
            [['sectionname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'sectionname' => 'Sectionname',
            'description' => 'Description',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['sectionid' => 'recid']);
    }
}
