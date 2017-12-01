<?php

namespace backend\modules\StockManagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\repatriate;

/**
 * RepatriateSearch represents the model behind the search form about `common\models\repatriate`.
 */
class RepatriateSearch extends repatriate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['repatriate_id', 'requisition_id', 'userlogin_user_id'], 'integer'],
            [['repatriate_re', 'repatriate_date'], 'safe'],
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
        $query = repatriate::find();

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
            'repatriate_id' => $this->repatriate_id,
            'repatriate_date' => $this->repatriate_date,
            'requisition_id' => $this->requisition_id,
            'userlogin_user_id' => $this->userlogin_user_id,
        ]);

        $query->andFilterWhere(['like', 'repatriate_re', $this->repatriate_re]);

        return $dataProvider;
    }
}
