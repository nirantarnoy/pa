<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assettypes".
 *
 * @property integer $recid
 * @property string $typename
 * @property string $description
 * @property string $createdate
 *
 * @property Assets[] $assets
 */
class Assettypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assettypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typename'], 'required'],
            [['description'], 'string'],
            [['createdate'], 'safe'],
            [['typename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'typename' => 'ประเภท',
            'description' => 'รายละเอียด',
            'createdate' => 'วันที่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Assets::className(), ['assettypeid' => 'recid']);
    }
}
