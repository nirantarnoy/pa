<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Adashboard;
use yii\web\Session;
$session = new Session();
$session->open();

/**
 * AdashboardSearch represents the model behind the search form about `backend\models\Adashboard`.
 */
class AdashboardSearch extends Adashboard
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'jobtype', 'jobaction', 'requestby', 'approvedby', 'jobstatus', 'operateby'], 'integer'],
            [['jobtitle', 'jobdate', 'aproveddate', 'startdate', 'enddate', 'comment', 'jobformat', 'jobcondition', 'attachfile', 'filetype', 'usdef1', 'usdef2', 'usdef3', 'usdef4', 'usdef5', 'usdef6', 'usdef7', 'usdef8', 'usdef9'], 'safe'],
       [['globalSearch'],'string'],
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
       
        if(!in_array($params,['1','2','3','4','5','6','7']))
        {
           $query = Adashboard::find()->where(['jobstatus' =>1]); 
        }
        else{
            $query = Adashboard::find()->where(['jobstatus' => 1,'jobtype'=>$params]);
        }
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
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

        $query->orFilterWhere(['like', 'jobtitle', $this->globalSearch])
            ->orFilterWhere(['like', 'comment', $this->globalSearch])
            ->orFilterWhere(['like', 'usdef1', $this->usdef1])
            ;

        return $dataProvider;
    }
}
