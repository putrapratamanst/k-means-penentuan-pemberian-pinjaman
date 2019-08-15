<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblUser;

/**
 * TblUserSearch represents the model behind the search form of `backend\models\TblUser`.
 */
class TblUserSearch extends TblUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nm_user', 'username', 'password', 'level_user', 'temla_user', 'tangla_user', 'almt_user', 'notelp_user'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TblUser::find();

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
            'tangla_user' => $this->tangla_user,
        ]);

        $query->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'nm_user', $this->nm_user])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'level_user', $this->level_user])
            ->andFilterWhere(['like', 'temla_user', $this->temla_user])
            ->andFilterWhere(['like', 'almt_user', $this->almt_user])
            ->andFilterWhere(['like', 'notelp_user', $this->notelp_user]);

        return $dataProvider;
    }
}
