<?php

namespace backend\modules\Reports\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ViewIssue;

/**
 * JournalSearch represents the model behind the search form about `common\models\Journal`.
 */
class IssuereportSearch extends ViewIssue
{
	
    /**
     * @inheritdoc
     */
     public function rules()
    {
        return [
            [['id', 'chemical_id', 'qty', 'return_qty'], 'integer'],
            [['chemical_name', 'chemical_formula', 'username'], 'required'],
            [['journal_no', 'issue_no'], 'string', 'max' => 25],
            [['description', 'username'], 'string', 'max' => 255],
            [['created_at'], 'string', 'max' => 24],
            [['chemical_name', 'chemical_formula'], 'string', 'max' => 100],
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
        $query = ViewIssue::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'created_by' => $this->created_by,
        //     'updated_by' => $this->updated_by,
        //     'status' => $this->status,
        //     'journal_type' => $this->journal_type,
        // ]);

        // $query->andFilterWhere(['like', 'journal_no', $this->journal_no])
        //     ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
