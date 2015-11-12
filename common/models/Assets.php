<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property integer $recid
 * @property string $assetname
 * @property string $description
 * @property integer $assettypeid
 * @property string $createdate
 *
 * @property Assettypes $assettype
 */
class Assets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assetname', 'assettypeid'], 'required'],
            [['description'], 'string'],
            [['assettypeid'], 'integer'],
            [['createdate'], 'safe'],
            [['assetname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'assetname' => 'ชื่ออุปกรณ์',
            'description' => 'รายละเอียด',
            'assettypeid' => 'ประเภท',
            'createdate' => 'วันที่',
            'typename'=>Yii::t('app','ประเภท'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssettype()
    {
        return $this->hasOne(Assettypes::className(), ['recid' => 'assettypeid']);
    }
    public function getTypename()
    {
        return $this->assettype->typename;
    }
}
