<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_pensiun".
 *
 * @property string $id_pensiun
 * @property string $no_pensiun
 * @property string $nm_pensiun
 * @property string $ktp_pensiun
 * @property string $kk_pensiun
 * @property string $file_ktp_pensiun
 * @property string $file_kk_pensiun
 * @property string $tgl_pensiun
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $almt_pensiun
 * @property string $notelp_pensiun
 * @property string $jk_pensiun
 * @property string $status_pensiun
 */
class TblPensiun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pensiun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pensiun', 'no_pensiun', 'nm_pensiun', 'ktp_pensiun', 'kk_pensiun', 'file_ktp_pensiun', 'file_kk_pensiun', 'tgl_pensiun', 'tempat_lahir', 'tanggal_lahir', 'almt_pensiun', 'notelp_pensiun', 'jk_pensiun'], 'required'],
            [['tgl_pensiun'], 'safe'],
            [['id_pensiun', 'file_kk_pensiun', 'status_pensiun'], 'string', 'max' => 100],
            [['no_pensiun', 'nm_pensiun', 'ktp_pensiun', 'kk_pensiun', 'file_ktp_pensiun', 'tempat_lahir', 'tanggal_lahir', 'almt_pensiun', 'notelp_pensiun', 'jk_pensiun'], 'string', 'max' => 200],
            [['id_pensiun'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pensiun' => 'Id Pensiun',
            'no_pensiun' => 'No Pensiun',
            'nm_pensiun' => 'Nm Pensiun',
            'ktp_pensiun' => 'Ktp Pensiun',
            'kk_pensiun' => 'Kk Pensiun',
            'file_ktp_pensiun' => 'File Ktp Pensiun',
            'file_kk_pensiun' => 'File Kk Pensiun',
            'tgl_pensiun' => 'Tgl Pensiun',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'almt_pensiun' => 'Almt Pensiun',
            'notelp_pensiun' => 'Notelp Pensiun',
            'jk_pensiun' => 'Jk Pensiun',
            'status_pensiun' => 'Status Pensiun',
        ];
    }
}
