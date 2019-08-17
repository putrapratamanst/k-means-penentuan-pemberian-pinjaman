<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pengajuan".
 *
 * @property int $id
 * @property string $id_pensiun
 * @property string $sub1
 * @property string $sub2
 * @property string $sub3
 * @property string $sub4
 */
class Pengajuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pensiun', 'sub1', 'sub2', 'sub3', 'sub4'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pensiun' => 'Id Pensiun',
            'sub1' => 'Penghasilan',
            'sub2' => 'Umur',
            'sub3' => 'Besar Pinjaman',
            'sub4' => 'Jangka Waktu',
        ];
    }

    public function getSubKriteria()
    {
        return $this->hasOne(Pengajuan::className(), ['id_pensiun' => 'id_pensiun']);
    }

    public function getPensiun()
    {
        return $this->hasOne(TblPensiun::className(), ['id_pensiun' => 'id_pensiun']);
    }


}
