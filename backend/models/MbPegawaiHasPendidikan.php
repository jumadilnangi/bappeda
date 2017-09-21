<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_pendidikan".
 *
 * @property integer $mb_pegawai_has_pendidikan_id
 * @property integer $mb_pegawai_id
 * @property integer $mb_pendidikan_tingkat_id
 * @property string $mb_pegawai_has_pendidikan_nama
 * @property string $mb_pegawai_has_pendidikan_mulai
 * @property string $mb_pegawai_has_pendidikan_akhir
 * @property string $mb_pegawai_has_pendidikan_file
 * @property string $mb_pegawai_has_pendidikan_gelar
 * @property string $mb_pegawai_has_pendidikan_ket
 * @property string $mb_pegawai_has_pendidikan_urutan
 *
 * @property MbPegawai $mbPegawai
 * @property MbPendidikanTingkat $mbPendidikanTingkat
 */
class MbPegawaiHasPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_pendidikan_tingkat_id'], 'required'],
            [['mb_pegawai_id', 'mb_pendidikan_tingkat_id'], 'integer'],
            [['mb_pegawai_has_pendidikan_mulai', 'mb_pegawai_has_pendidikan_akhir'], 'safe'],
            [['mb_pegawai_has_pendidikan_nama'], 'string', 'max' => 145],
            [['mb_pegawai_has_pendidikan_file', 'mb_pegawai_has_pendidikan_gelar', 'mb_pegawai_has_pendidikan_ket', 'mb_pegawai_has_pendidikan_urutan'], 'string', 'max' => 45],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['mb_pendidikan_tingkat_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPendidikanTingkat::className(), 'targetAttribute' => ['mb_pendidikan_tingkat_id' => 'mb_pendidikan_tingkat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_pendidikan_id' => 'Mb Pegawai Has Pendidikan ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_pendidikan_tingkat_id' => 'Mb Pendidikan Tingkat ID',
            'mb_pegawai_has_pendidikan_nama' => 'Mb Pegawai Has Pendidikan Nama',
            'mb_pegawai_has_pendidikan_mulai' => 'Mb Pegawai Has Pendidikan Mulai',
            'mb_pegawai_has_pendidikan_akhir' => 'Mb Pegawai Has Pendidikan Akhir',
            'mb_pegawai_has_pendidikan_file' => 'Mb Pegawai Has Pendidikan File',
            'mb_pegawai_has_pendidikan_gelar' => 'Mb Pegawai Has Pendidikan Gelar',
            'mb_pegawai_has_pendidikan_ket' => 'Mb Pegawai Has Pendidikan Ket',
            'mb_pegawai_has_pendidikan_urutan' => 'Mb Pegawai Has Pendidikan Urutan',
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
    public function getMbPendidikanTingkat()
    {
        return $this->hasOne(MbPendidikanTingkat::className(), ['mb_pendidikan_tingkat_id' => 'mb_pendidikan_tingkat_id']);
    }
}
