<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

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
 *
 * @property TblAlternatif[] $tblAlternatifs
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
            [['id_pensiun', 'no_pensiun', 'nm_pensiun', 'ktp_pensiun', 'kk_pensiun', 'tgl_pensiun', 'tempat_lahir', 'tanggal_lahir', 'almt_pensiun', 'notelp_pensiun', 'jk_pensiun'], 'required'],
            [['tgl_pensiun'], 'safe'],
            [['id_pensiun', 'file_kk_pensiun', 'status_pensiun'], 'string', 'max' => 100],
            [['no_pensiun', 'nm_pensiun', 'ktp_pensiun', 'kk_pensiun', 'file_ktp_pensiun', 'tempat_lahir', 'tanggal_lahir', 'almt_pensiun', 'notelp_pensiun', 'jk_pensiun'], 'string', 'max' => 200],
            [['id_pensiun'], 'unique'],
            [
                ['file_ktp_pensiun', 'file_kk_pensiun'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
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
            'nm_pensiun' => 'Nama Pensiun',
            'ktp_pensiun' => 'Ktp Pensiun',
            'kk_pensiun' => 'Kk Pensiun',
            'file_ktp_pensiun' => 'File Ktp Pensiun',
            'file_kk_pensiun' => 'File Kk Pensiun',
            'tgl_pensiun' => 'Tanggal Pensiun',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'almt_pensiun' => 'Alamat Pensiun',
            'notelp_pensiun' => 'Nomor Telepon Pensiun',
            'jk_pensiun' => 'Jenis Kelamin Pensiun',
            'status_pensiun' => 'Status Pensiun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAlternatifs()
    {
        return $this->hasMany(TblAlternatif::className(), ['id_pensiun' => 'id_pensiun']);
    }

    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['id_pensiun' => 'id_pensiun']);
    }


    public function reformattedPensiun()
    {
        $id     = $this->find()->max('RIGHT(id_pensiun,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);

        return "PN-" . $result;
    }

    public function upload($model,$attribute)
{
    $photo  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPath();
    if ($this->validate() && $photo !== null) {

        $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        //$fileName = $photo->baseName . '.' . $photo->extension;
        if($photo->saveAs($path.$fileName)){
          return $fileName;
        }
    }
    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
}

    public function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.'file_kk_pensiun'.'/';
    }

    public function getUploadUrl(){
        return Yii::getAlias('@web').'/'. 'file_kk_pensiun'.'/';
    }

    public function getPhotoViewer(){
        return empty($this->file_kk_pensiun) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->file_kk_pensiun;
    }

    public function uploadKtp($model,$attribute)
{
    $photo  = UploadedFile::getInstance($model, $attribute);
      $path = $this->getUploadPathKtp();
    if ($this->validate() && $photo !== null) {

        $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
        //$fileName = $photo->baseName . '.' . $photo->extension;
        if($photo->saveAs($path.$fileName)){
          return $fileName;
        }
    }
    return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
}

    public function getUploadPathKtp(){
        return Yii::getAlias('@webroot').'/'.'file_ktp_pensiun'.'/';
    }

    public function getUploadUrlKtp(){
        return Yii::getAlias('@web').'/'. 'file_ktp_pensiun'.'/';
    }

    public function getPhotoViewerKtp(){
        return empty($this->file_ktp_pensiun) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrlKtp().$this->file_ktp_pensiun;
    }
}
