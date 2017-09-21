<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_nomor_induk".
 *
 * @property integer $mb_pegawai_has_nomor_induk_idl
 * @property integer $mb_pegawai_id
 * @property integer $mb_nomor_induk_id
 * @property string $mb_pegawai_has_nomor_induk_nomor
 * @property string $mb_pegawai_has_nomor_induk_file
 * @property string $mb_pegawai_has_nomor_induk_mulai
 * @property string $mb_pegawai_has_nomor_induk_berakhir
 *
 * @property MbNomorInduk $mbNomorInduk
 * @property MbPegawai $mbPegawai
 */
class MbPegawaiHasNomorInduk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_nomor_induk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_nomor_induk_id'], 'required'],
            [['mb_pegawai_id', 'mb_nomor_induk_id'], 'integer'],
            [['mb_pegawai_has_nomor_induk_mulai', 'mb_pegawai_has_nomor_induk_berakhir'], 'safe'],
            [['mb_pegawai_has_nomor_induk_nomor'], 'string', 'max' => 145],
            [['mb_pegawai_has_nomor_induk_file'], 'string', 'max' => 45],
            [['mb_nomor_induk_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbNomorInduk::className(), 'targetAttribute' => ['mb_nomor_induk_id' => 'mb_nomor_induk_id']],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_nomor_induk_idl' => 'Mb Pegawai Has Nomor Induk Idl',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_nomor_induk_id' => 'Mb Nomor Induk ID',
            'mb_pegawai_has_nomor_induk_nomor' => 'Mb Pegawai Has Nomor Induk Nomor',
            'mb_pegawai_has_nomor_induk_file' => 'Mb Pegawai Has Nomor Induk File',
            'mb_pegawai_has_nomor_induk_mulai' => 'Mb Pegawai Has Nomor Induk Mulai',
            'mb_pegawai_has_nomor_induk_berakhir' => 'Mb Pegawai Has Nomor Induk Berakhir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbNomorInduk()
    {
        return $this->hasOne(MbNomorInduk::className(), ['mb_nomor_induk_id' => 'mb_nomor_induk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawai()
    {
        return $this->hasOne(MbPegawai::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }
}
