<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rekening_kelompok".
 *
 * @property integer $mb_rekening_kelompok_id
 * @property integer $mb_rekening_struk_id
 * @property integer $mb_rekening_kelompok_kode
 * @property string $mb_rekening_kelompok_nama
 * @property string $mb_rekening_kelompok_ket
 *
 * @property MbRekeningJenis[] $mbRekeningJenis
 * @property MbRekeningStruk $mbRekeningStruk
 */
class MbRekeningKelompok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rekening_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_struk_id'], 'required'],
            [['mb_rekening_struk_id', 'mb_rekening_kelompok_kode'], 'integer'],
            [['mb_rekening_kelompok_nama'], 'string', 'max' => 145],
            [['mb_rekening_kelompok_ket'], 'string', 'max' => 45],
            [['mb_rekening_struk_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRekeningStruk::className(), 'targetAttribute' => ['mb_rekening_struk_id' => 'mb_rekening_struk_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rekening_kelompok_id' => 'Mb Rekening Kelompok ID',
            'mb_rekening_struk_id' => 'Mb Rekening Struk ID',
            'mb_rekening_kelompok_kode' => 'Mb Rekening Kelompok Kode',
            'mb_rekening_kelompok_nama' => 'Mb Rekening Kelompok Nama',
            'mb_rekening_kelompok_ket' => 'Mb Rekening Kelompok Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningJenis()
    {
        return $this->hasMany(MbRekeningJenis::className(), ['mb_rekening_kelompok_id' => 'mb_rekening_kelompok_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningStruk()
    {
        return $this->hasOne(MbRekeningStruk::className(), ['mb_rekening_struk_id' => 'mb_rekening_struk_id']);
    }
}
