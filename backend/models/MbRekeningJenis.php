<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rekening_jenis".
 *
 * @property integer $mb_rekening_jenis_id
 * @property integer $mb_rekening_kelompok_id
 * @property integer $mb_rekening_jenis_kode
 * @property string $mb_rekening_jenis_nama
 * @property string $mb_rekening_jenis_ket
 *
 * @property MbRekeningKelompok $mbRekeningKelompok
 * @property MbRekeningObyek[] $mbRekeningObyeks
 */
class MbRekeningJenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rekening_jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_kelompok_id'], 'required'],
            [['mb_rekening_kelompok_id', 'mb_rekening_jenis_kode'], 'integer'],
            [['mb_rekening_jenis_nama'], 'string', 'max' => 145],
            [['mb_rekening_jenis_ket'], 'string', 'max' => 45],
            [['mb_rekening_kelompok_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRekeningKelompok::className(), 'targetAttribute' => ['mb_rekening_kelompok_id' => 'mb_rekening_kelompok_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rekening_jenis_id' => 'Mb Rekening Jenis ID',
            'mb_rekening_kelompok_id' => 'Mb Rekening Kelompok ID',
            'mb_rekening_jenis_kode' => 'Mb Rekening Jenis Kode',
            'mb_rekening_jenis_nama' => 'Mb Rekening Jenis Nama',
            'mb_rekening_jenis_ket' => 'Mb Rekening Jenis Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningKelompok()
    {
        return $this->hasOne(MbRekeningKelompok::className(), ['mb_rekening_kelompok_id' => 'mb_rekening_kelompok_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningObyeks()
    {
        return $this->hasMany(MbRekeningObyek::className(), ['mb_rekening_jenis_id' => 'mb_rekening_jenis_id']);
    }
}
