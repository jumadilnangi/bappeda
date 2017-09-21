<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_nomor_induk".
 *
 * @property integer $mb_nomor_induk_id
 * @property string $mb_nomor_induk_nama
 * @property string $mb_nomor_induk_sinkatan
 * @property string $mb_nomor_induk_ket
 *
 * @property MbPegawaiHasNomorInduk[] $mbPegawaiHasNomorInduks
 */
class MbNomorInduk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_nomor_induk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_nomor_induk_id'], 'required'],
            [['mb_nomor_induk_id'], 'integer'],
            [['mb_nomor_induk_nama'], 'string', 'max' => 145],
            [['mb_nomor_induk_sinkatan', 'mb_nomor_induk_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_nomor_induk_id' => 'Mb Nomor Induk ID',
            'mb_nomor_induk_nama' => 'Mb Nomor Induk Nama',
            'mb_nomor_induk_sinkatan' => 'Mb Nomor Induk Sinkatan',
            'mb_nomor_induk_ket' => 'Mb Nomor Induk Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasNomorInduks()
    {
        return $this->hasMany(MbPegawaiHasNomorInduk::className(), ['mb_nomor_induk_id' => 'mb_nomor_induk_id']);
    }
}
