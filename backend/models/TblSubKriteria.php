<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_sub_kriteria".
 *
 * @property string $id_sub_kriteria
 * @property string $id_kriteria
 * @property string $nm_sub_kriteria
 * @property string $bobot_sub_kriteria
 */
class TblSubKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_sub_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_kriteria', 'id_kriteria', 'nm_sub_kriteria', 'bobot_sub_kriteria'], 'required'],
            [['id_sub_kriteria', 'id_kriteria', 'nm_sub_kriteria', 'bobot_sub_kriteria'], 'string', 'max' => 100],
            [['id_sub_kriteria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sub_kriteria' => 'Id Sub Kriteria',
            'id_kriteria' => 'Id Kriteria',
            'nm_sub_kriteria' => 'Attribute Sub Kriteria',
            'bobot_sub_kriteria' => 'Bobot Sub Kriteria',
        ];
    }
    public function reformattedSubKriteria()
    {
        $id     = $this->find()->max('RIGHT(id_sub_kriteria,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);

        return "SKR-" . $result;
    }

}
