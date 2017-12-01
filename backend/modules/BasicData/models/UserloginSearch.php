<?php

namespace backend\modules\BasicData\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\userlogin;

/**
 * UserLoginSearch represents the model behind the search form about `common\models\userlogin`.
 */
class UserLoginSearch extends userlogin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'authority_id'], 'integer'],
            [['fname', 'lname', 'phone', 'active_flag'], 'safe'],
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
        $query = userlogin::find();

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
            'user_id' => $this->user_id,
            'authority_id' => $this->authority_id,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'active_flag', $this->active_flag]);

        return $dataProvider;
    }
}
