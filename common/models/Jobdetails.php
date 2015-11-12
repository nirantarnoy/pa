<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobdetails".
 *
 * @property integer $recid
 * @property integer $jobid
 * @property string $jobname
 * @property string $jobformat
 * @property string $jobcondition
 * @property string $attatchfile
 * @property string $attatchtype
 * @property string $usdef1
 * @property string $usdef2
 * @property string $usdef3
 * @property string $usdef4
 * @property string $usdef5
 * @property string $usdef6
 * @property string $usdef7
 * @property string $usdef8
 * @property string $usdef9
 *
 * @property Jobs $job
 */
class Jobdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobid'], 'required'],
            [['jobid'], 'integer'],
            [['jobname', 'jobformat', 'jobcondition', 'attatchfile', 'attatchtype', 'usdef1', 'usdef2', 'usdef3', 'usdef4', 'usdef5', 'usdef6', 'usdef7', 'usdef8', 'usdef9'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'jobid' => 'Jobid',
            'jobname' => 'Jobname',
            'jobformat' => 'Jobformat',
            'jobcondition' => 'Jobcondition',
            'attatchfile' => 'Attatchfile',
            'attatchtype' => 'Attatchtype',
            'usdef1' => 'Usdef1',
            'usdef2' => 'Usdef2',
            'usdef3' => 'Usdef3',
            'usdef4' => 'Usdef4',
            'usdef5' => 'Usdef5',
            'usdef6' => 'Usdef6',
            'usdef7' => 'Usdef7',
            'usdef8' => 'Usdef8',
            'usdef9' => 'Usdef9',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Jobs::className(), ['recid' => 'jobid']);
    }
}
