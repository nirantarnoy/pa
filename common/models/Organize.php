<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organize".
 *
 * @property integer $recid
 * @property string $organizename
 * @property string $description
 * @property string $createdate
 * @property string $updatedate
 */
class Organize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizename'], 'required'],
            [['description'], 'string'],
            [['createdate', 'updatedate'], 'safe'],
            [['organizename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'organizename' => 'Organizename',
            'description' => 'Description',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
