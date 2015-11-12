<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobtitles".
 *
 * @property integer $recid
 * @property string $titlename
 * @property integer $type
 */
class Jobtitles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobtitles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['titlename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'titlename' => 'Titlename',
            'type' => 'Type',
        ];
    }
}
