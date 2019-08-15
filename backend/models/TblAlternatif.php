<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_alternatif".
 *
 * @property string $id_alternatif
 * @property string $id_pensiun
 * @property string $kd_alternatif
 * @property string $nm_alternatif
 *
 * @property TblPensiun $pensiun
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
            // [['id_pensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TblPensiun::className(), 'targetAttribute' => ['id_pensiun' => 'id_pensiun']],
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
            'kd_alternatif' => 'Kode Alternatif',
            'nm_alternatif' => 'Nama Alternatif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPensiun()
    {
        return $this->hasOne(TblPensiun::className(), ['id_pensiun' => 'id_pensiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNilaiAlternatifs()
    {
        return $this->hasMany(TblNilaiAlternatif::className(), ['id_alternatif' => 'id_alternatif']);
    }

    public function reformattedAlternatif()
    {
        $id     = $this->find()->max('RIGHT(id_alternatif,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);

        return "AL-" . $result;
    }

    public function reformattedKodeAlternatif()
    {
        $id     = $this->find()->max('RIGHT(id_alternatif,4)');
        $tmp    = ((int) $id) + 1;

        return "A" . $tmp;
    }

}
