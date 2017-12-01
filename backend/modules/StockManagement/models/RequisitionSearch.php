<?php

namespace backend\modules\StockManagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\requisition;

/**
 * RequisitionSearch represents the model behind the search form about `common\models\requisition`.
 */
class RequisitionSearch extends requisition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requisition_id', 'userlogin_user_id'], 'integer'],
            [['description_re', 'requisition_date'], 'safe'],
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
        $query = requisition::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'requisition_id' => $this->requisition_id,
            'requisition_date' => $this->requisition_date,
            'userlogin_user_id' => $this->userlogin_user_id,
        ]);

        $query->andFilterWhere(['like', 'description_re', $this->description_re]);

        return $dataProvider;
    }
}
