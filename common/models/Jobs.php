<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property integer $recid
 * @property integer $jobtype
 * @property string $jobtitle
 * @property integer $jobaction
 * @property string $jobdate
 * @property string $aproveddate
 * @property integer $requestby
 * @property integer $approvedby
 * @property integer $jobstatus
 * @property string $startdate
 * @property string $enddate
 * @property integer $operateby
 * @property string $comment
 * @property string $jobformat
 * @property string $jobcondition
 * @property string $attachfile
 * @property string $filetype
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
 * @property Jobdetails[] $jobdetails
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['jobtype'], 'required'],
            [['jobtype', 'jobaction', 'requestby', 'approvedby', 'jobstatus', 'operateby','isapprove'], 'integer'],
            [['jobdate', 'aproveddate', 'startdate', 'enddate'], 'safe'],
            [['comment'], 'string'],
            [['jobtitle', 'jobformat', 'jobcondition', 'attachfile', 'filetype', 'usdef1', 'usdef2', 'usdef3', 'usdef4', 'usdef5', 'usdef6', 'usdef7', 'usdef8', 'usdef9'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'jobtype' => 'Jobtype',
            'jobtitle' => 'Jobtitle',
            'jobaction' => 'Jobaction',
            'jobdate' => 'Jobdate',
            'aproveddate' => 'Aproveddate',
            'requestby' => 'Requestby',
            'approvedby' => 'Approvedby',
            'jobstatus' => 'Jobstatus',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'operateby' => 'Operateby',
            'comment' => 'Comment',
            'jobformat' => 'Jobformat',
            'jobcondition' => 'Jobcondition',
            'attachfile' => 'Attachfile',
            'filetype' => 'Filetype',
            'usdef1' => 'Usdef1',
            'usdef2' => 'Usdef2',
            'usdef3' => 'Usdef3',
            'usdef4' => 'Usdef4',
            'usdef5' => 'Usdef5',
            'usdef6' => 'Usdef6',
            'usdef7' => 'Usdef7',
            'usdef8' => 'Usdef8',
            'usdef9' => 'Usdef9',
            'isapprove'=>'เป็นงานที่ต้องขออนุมัติ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobdetails()
    {
        return $this->hasMany(Jobdetails::className(), ['jobid' => 'recid']);
    }
}
