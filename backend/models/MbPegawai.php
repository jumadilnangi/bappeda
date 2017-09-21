<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai".
 *
 * @property integer $mb_pegawai_id
 * @property string $mb_pegawaic_nama
 * @property string $mb_pegawai_tempat_lahir
 * @property string $mb_pegawai_tgl_lahir
 * @property string $mb_pegawai_jk
 * @property integer $mb_agama_id
 * @property string $mb_pegawai_foto
 *
 * @property MbAgama $mbAgama
 * @property MbPegawaiHasFamily[] $mbPegawaiHasFamilies
 * @property MbPegawaiHasGolongan[] $mbPegawaiHasGolongans
 * @property MbPegawaiHasKontak[] $mbPegawaiHasKontaks
 * @property MbPegawaiHasNomorInduk[] $mbPegawaiHasNomorInduks
 * @property MbPegawaiHasPangkat[] $mbPegawaiHasPangkats
 * @property MbPegawaiHasPendidikan[] $mbPegawaiHasPendidikans
 * @property MbPengguna[] $mbPenggunas
 * @property MbSkpdHasPegawai[] $mbSkpdHasPegawais
 */
class MbPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_agama_id'], 'required'],
            [['mb_pegawai_id', 'mb_agama_id'], 'integer'],
            [['mb_pegawai_tgl_lahir'], 'safe'],
            [['mb_pegawaic_nama'], 'string', 'max' => 245],
            [['mb_pegawai_tempat_lahir', 'mb_pegawai_jk', 'mb_pegawai_foto'], 'string', 'max' => 45],
            [['mb_agama_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbAgama::className(), 'targetAttribute' => ['mb_agama_id' => 'mb_agama_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_pegawaic_nama' => 'Mb Pegawaic Nama',
            'mb_pegawai_tempat_lahir' => 'Mb Pegawai Tempat Lahir',
            'mb_pegawai_tgl_lahir' => 'Mb Pegawai Tgl Lahir',
            'mb_pegawai_jk' => 'Mb Pegawai Jk',
            'mb_agama_id' => 'Mb Agama ID',
            'mb_pegawai_foto' => 'Mb Pegawai Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbAgama()
    {
        return $this->hasOne(MbAgama::className(), ['mb_agama_id' => 'mb_agama_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasFamilies()
    {
        return $this->hasMany(MbPegawaiHasFamily::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasGolongans()
    {
        return $this->hasMany(MbPegawaiHasGolongan::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasKontaks()
    {
        return $this->hasMany(MbPegawaiHasKontak::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasNomorInduks()
    {
        return $this->hasMany(MbPegawaiHasNomorInduk::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasPangkats()
    {
        return $this->hasMany(MbPegawaiHasPangkat::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasPendidikans()
    {
        return $this->hasMany(MbPegawaiHasPendidikan::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPenggunas()
    {
        return $this->hasMany(MbPengguna::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpdHasPegawais()
    {
        return $this->hasMany(MbSkpdHasPegawai::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }
}
