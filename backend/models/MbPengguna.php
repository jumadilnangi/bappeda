<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pengguna".
 *
 * @property integer $mb_penggunacol
 * @property integer $mb_pegawai_id
 * @property integer $mb_skpd_id
 * @property string $mb_pengguna_username
 * @property string $mb_pengguna_password
 * @property string $mb_pengguna_level
 * @property string $mb_pengguna_ket
 *
 * @property MbPegawai $mbPegawai
 * @property MbSkpd $mbSkpd
 */
class MbPengguna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_skpd_id', 'mb_pengguna_username'], 'required'],
            [['mb_pegawai_id', 'mb_skpd_id'], 'integer'],
            [['mb_pengguna_password'], 'string'],
            [['mb_pengguna_username', 'mb_pengguna_level', 'mb_pengguna_ket'], 'string', 'max' => 45],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['mb_skpd_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbSkpd::className(), 'targetAttribute' => ['mb_skpd_id' => 'mb_skpd_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_penggunacol' => 'Mb Penggunacol',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_skpd_id' => 'Mb Skpd ID',
            'mb_pengguna_username' => 'Mb Pengguna Username',
            'mb_pengguna_password' => 'Mb Pengguna Password',
            'mb_pengguna_level' => 'Mb Pengguna Level',
            'mb_pengguna_ket' => 'Mb Pengguna Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawai()
    {
        return $this->hasOne(MbPegawai::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpd()
    {
        return $this->hasOne(MbSkpd::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }
}
