<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pengajuan;
use Yii;

/**
 * PengajuanSearch represents the model behind the search form of `frontend\models\Pengajuan`.
 */
class PengajuanSearch extends Pengajuan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_pensiun', 'sub1', 'sub2', 'sub3', 'sub4'], 'safe'],
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
        $nama = Yii::$app->user->identity->username;
        $query = Pengajuan::find()->joinWith(['alternatif'])->where(['tbl_alternatif.nm_alternatif' => $nama ]);

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'id_pensiun', $this->id_pensiun])
            ->andFilterWhere(['like', 'sub1', $this->sub1])
            ->andFilterWhere(['like', 'sub2', $this->sub2])
            ->andFilterWhere(['like', 'sub3', $this->sub3])
            ->andFilterWhere(['like', 'sub4', $this->sub4]);

        return $dataProvider;
    }
}
