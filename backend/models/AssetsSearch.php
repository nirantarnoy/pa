<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Assets;
use backend\models\Assettype;

/**
 * AssetsSearch represents the model behind the search form about `backend\models\Assets`.
 */
class AssetsSearch extends Assets
{
    public $globalSearch;
    public $typename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'assettypeid'], 'integer'],
            [['assetname', 'description', 'createdate'], 'safe'],
            [['globalSearch',],'string'],
            [['typename'],'safe'],
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
        $query = Assets::find();
        $query->joinWith('assettype');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
         $dataProvider->sort->attributes['typename'] = [
            'asc' => ['Assettypes.typename' => SORT_ASC],
            'desc' => ['Assettypes.typename' => SORT_DESC],
        ];

//        $query->andFilterWhere([
//            'recid' => $this->recid,
//            'assettypeid' => $this->assettypeid,
//            'createdate' => $this->createdate,
//        ]);

        $query->orFilterWhere(['like', 'assetname', $this->globalSearch])
            ->orFilterWhere(['like', 'Assets.description', $this->globalSearch])
             ->orFilterWhere(['like', 'typename', $this->globalSearch]);

        return $dataProvider;
    }
     
}
