<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SummaryOnSite;

/**
 * SummaryOnSiteSearch represents the model behind the search form about `common\models\SummaryOnSite`.
 */
class SummaryOnSiteSearch extends SummaryOnSite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summary_id', 'software_id', 'computer_id', 'created_by', 'updated_by', 'created_at', 'updated_at','is_status'], 'integer'],
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
        $query = SummaryOnSite::find()->where('is_status != 2');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['software_id']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'summary_id' => $this->summary_id,
            'software_id' => $this->software_id,
            'computer_id' => $this->computer_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_status' => $this->is_status,
        ]);

        return $dataProvider;
    }
    
    //Search for Computer_id 
    public function get_sos($param)
    {
        $query = SummaryOnSite::find()->where(['software_id' => $_REQUEST['id']]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($param);
        
        if(!$this->validate()){
            return $dataProvider;
        }
        $query->andFilterWhere([
            'summary_id' => $this->summary_id,
            'software_id' => $this->software_id,
            'computer_id' => $this->computer_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
    
}
