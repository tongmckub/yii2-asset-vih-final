<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ComputerVih;

/**
 * ComputerVihSearch represents the model behind the search form about `common\models\ComputerVih`.
 */
class ComputerVihSearch extends ComputerVih
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['computer_id', 'division_id', 'created_by'], 'integer'],
            [['asset_code', 'of_user', 'serial_no', 'computer_localtion', 'computer_name', 'ip', 'mac_address'], 'safe'],
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
        $query = ComputerVih::find();

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
            'computer_id' => $this->computer_id,
            'division_id' => $this->division_id,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'asset_code', $this->asset_code])
            ->andFilterWhere(['like', 'of_user', $this->of_user])
            ->andFilterWhere(['like', 'serial_no', $this->serial_no])
            ->andFilterWhere(['like', 'computer_localtion', $this->computer_localtion])
            ->andFilterWhere(['like', 'computer_name', $this->computer_name])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'mac_address', $this->mac_address]);

        return $dataProvider;
    }
}
