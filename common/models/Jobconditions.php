<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobconditions".
 *
 * @property integer $recid
 * @property string $conditionname
 */
class Jobconditions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobconditions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conditionname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'conditionname' => 'Conditionname',
        ];
    }
}
