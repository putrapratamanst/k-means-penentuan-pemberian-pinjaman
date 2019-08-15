<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblNilaiAlternatif;

/**
 * TblNilaiAlternatifSearch represents the model behind the search form of `frontend\models\TblNilaiAlternatif`.
 */
class TblNilaiAlternatifSearch extends TblNilaiAlternatif
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nilai_alternatif', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'safe'],
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
        $query = TblNilaiAlternatif::find();

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
        $query->andFilterWhere(['like', 'id_nilai_alternatif', $this->id_nilai_alternatif])
            ->andFilterWhere(['like', 'id_alternatif', $this->id_alternatif])
            ->andFilterWhere(['like', 'id_kriteria', $this->id_kriteria])
            ->andFilterWhere(['like', 'id_sub_kriteria', $this->id_sub_kriteria]);

        return $dataProvider;
    }
}
