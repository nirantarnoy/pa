<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobactions".
 *
 * @property integer $recid
 * @property string $actionname
 */
class Jobactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actionname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'actionname' => 'Actionname',
        ];
    }
}
