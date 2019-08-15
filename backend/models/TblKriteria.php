<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_kriteria".
 *
 * @property string $id_kriteria
 * @property string $kd_kriteria
 * @property string $nm_kriteria
 * @property string $bobot_kriteria
 */
class TblKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kriteria', 'kd_kriteria', 'nm_kriteria', 'bobot_kriteria'], 'required'],
            [['id_kriteria', 'kd_kriteria', 'nm_kriteria', 'bobot_kriteria'], 'string', 'max' => 100],
            [['id_kriteria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kriteria' => 'Id Kriteria',
            'kd_kriteria' => 'Kd Kriteria',
            'nm_kriteria' => 'Nm Kriteria',
            'bobot_kriteria' => 'Bobot Kriteria',
        ];
    }

    public function reformattedKriteria()
    {
        $id     = $this->find()->max('RIGHT(id_kriteria,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);

        return "KR-" . $result;
    }

    public function getSubKriteria()
    {
        return $this->hasOne(TblSubKriteria::className(), ['id_kriteria' => 'id_kriteria']);
    }


}
