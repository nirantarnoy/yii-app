<?php

namespace backend\modules\ChemicalsManagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\item;

/**
 * ItemSearch represents the model behind the search form about `common\models\item`.
 */
class ItemSearch extends item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_ID', 'Remaining_volume', 'room_id', 'chemical_ID', 'grade_id', 'marker_id', 'user_id'], 'integer'],
            [['location', 'status', 'size', 'opendate', 'worningdate', 'expireddate'], 'safe'],
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
        $query = item::find();

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
            'Remaining_volume' => $this->Remaining_volume,
            'opendate' => $this->opendate,
            'worningdate' => $this->worningdate,
            'expireddate' => $this->expireddate,
            'room_id' => $this->room_id,
            'chemical_ID' => $this->chemical_ID,
            'grade_id' => $this->grade_id,
            'marker_id' => $this->marker_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'size', $this->size]);

        return $dataProvider;
    }
}
