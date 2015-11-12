<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reqprogram;
use yii\web\Session;

/**
 * ReqprogramSearch represents the model behind the search form about `backend\models\Reqprogram`.
 */
class ReqprogramSearch extends Reqprogram {

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['recid', 'jobtype', 'jobaction', 'requestby', 'approvedby', 'jobstatus', 'operateby'], 'integer'],
            [['jobtitle', 'jobdate', 'aproveddate', 'startdate', 'enddate', 'comment'], 'safe'],
            [['globalSearch'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Reqprogram::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //     $query->andFilterWhere([
//            'recid' => $this->recid,
        //           'jobtype' => 1
//            'jobaction' => $this->jobaction,
//            'jobdate' => $this->jobdate,
//            'aproveddate' => $this->aproveddate,
//            'requestby' => $this->requestby,
//            'approvedby' => $this->approvedby,
//            'jobstatus' => $this->jobstatus,
//            'startdate' => $this->startdate,
//            'enddate' => $this->enddate,
//            'operateby' => $this->operateby,
        //      ]);
        $session = new Session();
        $session->open();

        if ($session['groupid'] <> 1) {
            $query->orFilterWhere(['like', 'jobtitle', $this->globalSearch])
                    ->orFilterWhere(['like', 'comment', $this->globalSearch])
                    ->andFilterWhere(['=', 'jobtype', 1])
                    ->andFilterWhere(['=', 'requestby', $session['userid']]);
        } else {
            $query->orFilterWhere(['like', 'jobtitle', $this->globalSearch])
                    ->orFilterWhere(['like', 'comment', $this->globalSearch])
                    ->andFilterWhere(['=', 'jobtype', 1]);
        }


        return $dataProvider;
    }

}
