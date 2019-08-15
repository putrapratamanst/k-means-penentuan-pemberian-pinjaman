<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_nilai_alternatif".
 *
 * @property string $id_nilai_alternatif
 * @property string $id_alternatif
 * @property string $id_kriteria
 * @property string $id_sub_kriteria
 *
 * @property TblAlternatif $alternatif
 */
class TblNilaiAlternatif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_nilai_alternatif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nilai_alternatif', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'required'],
            [['id_nilai_alternatif', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'string', 'max' => 100],
            [['id_nilai_alternatif'], 'unique'],
            [['id_alternatif'], 'exist', 'skipOnError' => true, 'targetClass' => TblAlternatif::className(), 'targetAttribute' => ['id_alternatif' => 'id_alternatif']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_alternatif' => 'Id Nilai Alternatif',
            'id_alternatif' => 'Id Alternatif',
            'id_kriteria' => 'Id Kriteria',
            'id_sub_kriteria' => 'Id Sub Kriteria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlternatif()
    {
        return $this->hasOne(TblAlternatif::className(), ['id_alternatif' => 'id_alternatif']);
    }
}
