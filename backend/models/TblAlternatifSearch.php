<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblAlternatif;

/**
 * TblAlternatifSearch represents the model behind the search form of `backend\models\TblAlternatif`.
 */
class TblAlternatifSearch extends TblAlternatif
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alternatif', 'id_pensiun', 'kd_alternatif', 'nm_alternatif'], 'safe'],
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
        $query = TblAlternatif::find();

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
        $query->andFilterWhere(['like', 'id_alternatif', $this->id_alternatif])
            ->andFilterWhere(['like', 'id_pensiun', $this->id_pensiun])
            ->andFilterWhere(['like', 'kd_alternatif', $this->kd_alternatif])
            ->andFilterWhere(['like', 'nm_alternatif', $this->nm_alternatif]);

        return $dataProvider;
    }
}
