<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Party;

/**
 * PartySearch represents the model behind the search form about `common\models\Party`.
 */
class PartySearch extends Party
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id'], 'integer'],
            [['party_name'], 'safe'],
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
        $query = Party::find();

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
            'party_id' => $this->party_id,
        ]);

        $query->andFilterWhere(['like', 'party_name', $this->party_name]);

        return $dataProvider;
    }
}
