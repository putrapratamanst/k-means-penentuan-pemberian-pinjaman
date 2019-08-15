<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKriteria;

/**
 * TblKriteriaSearch represents the model behind the search form of `backend\models\TblKriteria`.
 */
class TblKriteriaSearch extends TblKriteria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kriteria', 'kd_kriteria', 'nm_kriteria', 'bobot_kriteria'], 'safe'],
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
        $query = TblKriteria::find();

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
        $query->andFilterWhere(['like', 'id_kriteria', $this->id_kriteria])
            ->andFilterWhere(['like', 'kd_kriteria', $this->kd_kriteria])
            ->andFilterWhere(['like', 'nm_kriteria', $this->nm_kriteria])
            ->andFilterWhere(['like', 'bobot_kriteria', $this->bobot_kriteria]);

        return $dataProvider;
    }
}
