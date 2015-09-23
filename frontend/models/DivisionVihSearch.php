<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DivisionVih;

/**
 * DivisionVihSearch represents the model behind the search form about `common\models\DivisionVih`.
 */
class DivisionVihSearch extends DivisionVih
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['division_id'], 'integer'],
            [['division_name'], 'safe'],
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
        $query = DivisionVih::find();

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
            'division_id' => $this->division_id,
        ]);

        $query->andFilterWhere(['like', 'division_name', $this->division_name]);

        return $dataProvider;
    }
}
