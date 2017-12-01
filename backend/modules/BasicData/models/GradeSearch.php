<?php

namespace backend\modules\BasicData\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\grade;

/**
 * GradeSearch represents the model behind the search form about `common\models\grade`.
 */
class GradeSearch extends grade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade_id'], 'integer'],
            [['grade_name'], 'safe'],
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
        $query = grade::find();

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
            'grade_id' => $this->grade_id,
        ]);

        $query->andFilterWhere(['like', 'grade_name', $this->grade_name]);

        return $dataProvider;
    }
}
