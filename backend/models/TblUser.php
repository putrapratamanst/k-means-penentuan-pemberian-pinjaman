<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $id_user
 * @property string $nm_user
 * @property string $username
 * @property string $password
 * @property string $level_user
 * @property string $temla_user
 * @property string $tangla_user
 * @property string $almt_user
 * @property string $notelp_user
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nm_user', 'username', 'password', 'level_user', 'temla_user', 'tangla_user', 'almt_user', 'notelp_user'], 'required'],
            [['tangla_user'], 'safe'],
            [['id_user', 'nm_user', 'username', 'password', 'level_user', 'temla_user', 'almt_user', 'notelp_user'], 'string', 'max' => 100],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'nm_user' => 'Nama User',
            'username' => 'Username',
            'password' => 'Password',
            'level_user' => 'Level User',
            'temla_user' => 'Tempat Lahir User',
            'tangla_user' => 'Tanggal Lahir User',
            'almt_user' => 'Alamat User',
            'notelp_user' => 'No Telepon User',
        ];
    }

    public function reformattedUser()
    {
        $id     = $this->find()->max('RIGHT(id_user,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);

        return "US-" . $result;
    }

}
