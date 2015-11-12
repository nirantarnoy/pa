<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assignroles;

/**
 * AssignrolesSearch represents the model behind the search form about `backend\models\Assignroles`.
 */
class AssignrolesSearch extends Assignroles
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'userid', 'departmentid', 'roleid'], 'integer'],
            [['description', 'createdate', 'updatedate'], 'safe'],
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
        $query = Assignroles::find();

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
//            'userid' => $this->userid,
//            'departmentid' => $this->departmentid,
//            'roleid' => $this->roleid,
//            'createdate' => $this->createdate,
//            'updatedate' => $this->updatedate,
//        ]);

        $query->orFilterWhere(['like', 'description', $this->globalSearch]);
           //    ->orFilterWhere(['like', 'user.fname', $this->globalSearch]) ;
        
       $query->joinWith(['user'=>function($q){
           $q->where('user.fname like "%'.$this->globalSearch.'%"');
       }]);
     

        return $dataProvider;
    }
}
