<?php

namespace backend\modules\StockManagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ItemHasRequisition;

/**
 * ItemHasRequisitionSearch represents the model behind the search form about `common\models\ItemHasRequisition`.
 */
class ItemHasRequisitionSearch extends ItemHasRequisition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_ID', 'requisition_id', 'volum_apply'], 'integer'],
            [['method'], 'safe'],
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
        $query = ItemHasRequisition::find();

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
            'item_ID' => $this->item_ID,
            'requisition_id' => $this->requisition_id,
            'volum_apply' => $this->volum_apply,
        ]);

        $query->andFilterWhere(['like', 'method', $this->method]);

        return $dataProvider;
    }
}
