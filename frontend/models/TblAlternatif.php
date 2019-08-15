<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_alternatif".
 *
 * @property string $id_alternatif
 * @property string $id_pensiun
 * @property string $kd_alternatif
 * @property string $nm_alternatif
 *
 * @property TblNilaiAlternatif[] $tblNilaiAlternatifs
 */
class TblAlternatif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_alternatif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alternatif', 'kd_alternatif', 'nm_alternatif'], 'required'],
            [['id_alternatif', 'kd_alternatif', 'nm_alternatif'], 'string', 'max' => 100],
            [['id_pensiun'], 'string', 'max' => 255],
            [['id_alternatif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alternatif' => 'Id Alternatif',
            'id_pensiun' => 'Id Pensiun',
            'kd_alternatif' => 'Kd Alternatif',
            'nm_alternatif' => 'Nm Alternatif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNilaiAlternatifs()
    {
        return $this->hasMany(TblNilaiAlternatif::className(), ['id_alternatif' => 'id_alternatif']);
    }
}
