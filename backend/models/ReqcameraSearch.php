<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reqcamera;
use yii\web\Session;



/**
 * ReqcameraSearch represents the model behind the search form about `backend\models\Reqcamera`.
 */
class ReqcameraSearch extends Reqcamera {

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
        $query = Reqcamera::find();

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


$session = new Session();
$session->open();

        if ($session['groupid'] <> 1) {
            $query->orFilterWhere(['like', 'jobtitle', $this->globalSearch])
                    ->orFilterWhere(['like', 'comment', $this->globalSearch])
                    ->andFilterWhere(['=', 'jobtype', 5])
                    ->andFilterWhere(['=', 'requestby', $session['userid']]);
        } else {
            $query->orFilterWhere(['like', 'jobtitle', $this->globalSearch])
                    ->orFilterWhere(['like', 'comment', $this->globalSearch])
                    ->andFilterWhere(['=', 'jobtype', 5]);
        }

        return $dataProvider;
    }

}
