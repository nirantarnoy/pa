<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dasboarddetail;
use yii\web\Session;

$session = new Session();
$session->open();

/**
 * DasboarddetailSearch represents the model behind the search form about `backend\models\Dasboarddetail`.
 */
class DasboarddetailSearch extends Dasboarddetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'jobtype', 'jobaction', 'requestby', 'approvedby', 'jobstatus', 'operateby'], 'integer'],
            [['jobtitle', 'jobdate', 'aproveddate', 'startdate', 'enddate', 'comment', 'jobformat', 'jobcondition', 'attachfile', 'filetype', 'usdef1', 'usdef2', 'usdef3', 'usdef4', 'usdef5', 'usdef6', 'usdef7', 'usdef8', 'usdef9'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dasboarddetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
           // $query->where(['jobstatus'=>1]);
            return $dataProvider;
        }

//        $query->andFilterWhere([
//            'recid' => $this->recid,
//            'jobtype' => $this->jobtype,
//            'jobaction' => $this->jobaction,
//            'jobdate' => $this->jobdate,
//            'aproveddate' => $this->aproveddate,
//            'requestby' => $this->requestby,
//            'approvedby' => $this->approvedby,
//            'jobstatus' => $this->jobstatus,
//            'startdate' => $this->startdate,
//            'enddate' => $this->enddate,
//            'operateby' => $this->operateby,
//        ]);

//        $query->andFilterWhere(['like', 'jobtitle', $this->jobtitle])
//            ->andFilterWhere(['like', 'comment', $this->comment])
//            ->andFilterWhere(['like', 'jobformat', $this->jobformat])
//            ->andFilterWhere(['like', 'jobcondition', $this->jobcondition])
//            ->andFilterWhere(['like', 'attachfile', $this->attachfile])
//            ->andFilterWhere(['like', 'filetype', $this->filetype])
//            ->andFilterWhere(['like', 'usdef1', $this->usdef1])
//            ->andFilterWhere(['like', 'usdef2', $this->usdef2])
//            ->andFilterWhere(['like', 'usdef3', $this->usdef3])
//            ->andFilterWhere(['like', 'usdef4', $this->usdef4])
//            ->andFilterWhere(['like', 'usdef5', $this->usdef5])
//            ->andFilterWhere(['like', 'usdef6', $this->usdef6])
//            ->andFilterWhere(['like', 'usdef7', $this->usdef7])
//            ->andFilterWhere(['like', 'usdef8', $this->usdef8])
//            ->andFilterWhere(['like', 'usdef9', $this->usdef9]);
        $session = new Session();
        $session->open();
        $query->andFilterWhere(['=', 'jobstatus', $params])
              ->andFilterWhere(['=','requestby',$session['userid']]);

        return $dataProvider;
    }
}
