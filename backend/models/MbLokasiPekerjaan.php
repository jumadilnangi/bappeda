<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_lokasi_pekerjaan".
 *
 * @property integer $mb_lokasi_pekerjaan_id
 * @property integer $mb_uraian_pekerjaan_id
 * @property integer $mb_kelurahan_desa_id
 * @property string $mb_lokasi_pekerjaan_latitudes
 * @property string $mb_lokasi_pekerjaan_longitudes
 * @property string $mb_lokasi_pekerjaan_rw
 * @property string $mb_lokasi_pekerjaan_rt
 * @property string $mb_lokasi_pekerjaan_ket
 *
 * @property MbKelurahanDesa $mbKelurahanDesa
 * @property MbUraianPekerjaan $mbUraianPekerjaan
 */
class MbLokasiPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_lokasi_pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_uraian_pekerjaan_id', 'mb_kelurahan_desa_id'], 'required'],
            [['mb_uraian_pekerjaan_id', 'mb_kelurahan_desa_id'], 'integer'],
            [['mb_lokasi_pekerjaan_latitudes', 'mb_lokasi_pekerjaan_longitudes'], 'number'],
            [['mb_lokasi_pekerjaan_rw', 'mb_lokasi_pekerjaan_rt', 'mb_lokasi_pekerjaan_ket'], 'string', 'max' => 45],
            [['mb_kelurahan_desa_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbKelurahanDesa::className(), 'targetAttribute' => ['mb_kelurahan_desa_id' => 'mb_kelurahan_desa_id']],
            [['mb_uraian_pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUraianPekerjaan::className(), 'targetAttribute' => ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_lokasi_pekerjaan_id' => 'Lokasi Pekerjaan ',
            'mb_uraian_pekerjaan_id' => 'Uraian Pekerjaan',
            'mb_kelurahan_desa_id' => 'Kelurahan / Desa',
            'mb_lokasi_pekerjaan_latitudes' => 'Latitudes',
            'mb_lokasi_pekerjaan_longitudes' => 'Longitudes',
            'mb_lokasi_pekerjaan_rw' => 'RW',
            'mb_lokasi_pekerjaan_rt' => 'RT',
            'mb_lokasi_pekerjaan_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKelurahanDesa()
    {
        return $this->hasOne(MbKelurahanDesa::className(), ['mb_kelurahan_desa_id' => 'mb_kelurahan_desa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaan()
    {
        return $this->hasOne(MbUraianPekerjaan::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
    }
}
