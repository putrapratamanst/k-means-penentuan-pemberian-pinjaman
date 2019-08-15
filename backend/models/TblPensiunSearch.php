<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPensiun;

/**
 * TblPensiunSearch represents the model behind the search form of `backend\models\TblPensiun`.
 */
class TblPensiunSearch extends TblPensiun
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pensiun', 'no_pensiun', 'nm_pensiun', 'ktp_pensiun', 'kk_pensiun', 'file_ktp_pensiun', 'file_kk_pensiun', 'tgl_pensiun', 'tempat_lahir', 'tanggal_lahir', 'almt_pensiun', 'notelp_pensiun', 'jk_pensiun', 'status_pensiun'], 'safe'],
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
        $query = TblPensiun::find();

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
            'tgl_pensiun' => $this->tgl_pensiun,
        ]);

        $query->andFilterWhere(['like', 'id_pensiun', $this->id_pensiun])
            ->andFilterWhere(['like', 'no_pensiun', $this->no_pensiun])
            ->andFilterWhere(['like', 'nm_pensiun', $this->nm_pensiun])
            ->andFilterWhere(['like', 'ktp_pensiun', $this->ktp_pensiun])
            ->andFilterWhere(['like', 'kk_pensiun', $this->kk_pensiun])
            ->andFilterWhere(['like', 'file_ktp_pensiun', $this->file_ktp_pensiun])
            ->andFilterWhere(['like', 'file_kk_pensiun', $this->file_kk_pensiun])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'almt_pensiun', $this->almt_pensiun])
            ->andFilterWhere(['like', 'notelp_pensiun', $this->notelp_pensiun])
            ->andFilterWhere(['like', 'jk_pensiun', $this->jk_pensiun])
            ->andFilterWhere(['like', 'status_pensiun', $this->status_pensiun]);

        return $dataProvider;
    }
}
