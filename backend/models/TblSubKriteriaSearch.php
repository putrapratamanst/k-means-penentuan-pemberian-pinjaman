<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSubKriteria;

/**
 * TblSubKriteriaSearch represents the model behind the search form of `backend\models\TblSubKriteria`.
 */
class TblSubKriteriaSearch extends TblSubKriteria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_kriteria', 'id_kriteria', 'nm_sub_kriteria', 'bobot_sub_kriteria'], 'safe'],
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
        $query = TblSubKriteria::find();

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
        $query->andFilterWhere(['like', 'id_sub_kriteria', $this->id_sub_kriteria])
            ->andFilterWhere(['like', 'id_kriteria', $this->id_kriteria])
            ->andFilterWhere(['like', 'nm_sub_kriteria', $this->nm_sub_kriteria])
            ->andFilterWhere(['like', 'bobot_sub_kriteria', $this->bobot_sub_kriteria]);

        return $dataProvider;
    }
}
