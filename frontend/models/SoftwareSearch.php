<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Software;

/**
 * SoftwareSearch represents the model behind the search form about `common\models\Software`.
 */
class SoftwareSearch extends Software
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['software_id', 'created_by', 'created_at', 'updated_at', 'updated_by'], 'integer'],
            [['software_name', 'software_detail'], 'safe'],
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
        $query = Software::find();

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
            'software_id' => $this->software_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'software_name', $this->software_name])
            ->andFilterWhere(['like', 'software_detail', $this->software_detail]);

        return $dataProvider;
    }
}
