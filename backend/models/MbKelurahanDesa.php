<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_kelurahan_desa".
 *
 * @property integer $mb_kelurahan_desa_id
 * @property integer $mb_kecamatan_id
 * @property string $mb_kelurahan_desa_kode
 * @property string $mb_kelurahan_desa_nama
 *
 * @property MbKecamatan $mbKecamatan
 * @property MbLokasiPekerjaan[] $mbLokasiPekerjaans
 */
class MbKelurahanDesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_kelurahan_desa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kecamatan_id'], 'required'],
            [['mb_kecamatan_id'], 'integer'],
            [['mb_kelurahan_desa_kode'], 'string', 'max' => 45],
            [['mb_kelurahan_desa_nama'], 'string', 'max' => 145],
            [['mb_kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbKecamatan::className(), 'targetAttribute' => ['mb_kecamatan_id' => 'mb_kecamatan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_kelurahan_desa_id' => 'Mb Kelurahan Desa ID',
            'mb_kecamatan_id' => 'Mb Kecamatan ID',
            'mb_kelurahan_desa_kode' => 'Mb Kelurahan Desa Kode',
            'mb_kelurahan_desa_nama' => 'Mb Kelurahan Desa Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKecamatan()
    {
        return $this->hasOne(MbKecamatan::className(), ['mb_kecamatan_id' => 'mb_kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbLokasiPekerjaans()
    {
        return $this->hasMany(MbLokasiPekerjaan::className(), ['mb_kelurahan_desa_id' => 'mb_kelurahan_desa_id']);
    }
}
