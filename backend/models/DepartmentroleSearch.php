<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departmentrole;

/**
 * DepartmentroleSearch represents the model behind the search form about `backend\models\Departmentrole`.
 */
class DepartmentroleSearch extends Departmentrole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'sectionid'], 'integer'],
            [['departmentname', 'description', 'createdate', 'updatedate'], 'safe'],
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
        $query = Departmentrole::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'recid' => $this->recid,
            'sectionid' => $this->sectionid,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'departmentname', $this->departmentname])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
