<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_kecamatan".
 *
 * @property integer $mb_kecamatan_id
 * @property integer $mb_kabupaten_kota_id
 * @property string $mb_kecamatan_kode
 * @property string $mb_kecamatan_nama
 *
 * @property MbKabupatenKota $mbKabupatenKota
 * @property MbKelurahanDesa[] $mbKelurahanDesas
 */
class MbKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kabupaten_kota_id'], 'required'],
            [['mb_kabupaten_kota_id'], 'integer'],
            [['mb_kecamatan_kode'], 'string', 'max' => 45],
            [['mb_kecamatan_nama'], 'string', 'max' => 145],
            [['mb_kabupaten_kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbKabupatenKota::className(), 'targetAttribute' => ['mb_kabupaten_kota_id' => 'mb_kabupaten_kota_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_kecamatan_id' => 'Mb Kecamatan ID',
            'mb_kabupaten_kota_id' => 'Kabupaten ',
            'mb_kecamatan_kode' => 'Kode Kecamatan ',
            'mb_kecamatan_nama' => 'Nama Kecamatan ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKabupatenKota()
    {
        return $this->hasOne(MbKabupatenKota::className(), ['mb_kabupaten_kota_id' => 'mb_kabupaten_kota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKelurahanDesas()
    {
        return $this->hasMany(MbKelurahanDesa::className(), ['mb_kecamatan_id' => 'mb_kecamatan_id']);
    }
}
