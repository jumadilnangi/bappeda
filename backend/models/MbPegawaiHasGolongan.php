<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_golongan".
 *
 * @property integer $mb_pegawai_has_golongan_id
 * @property integer $mb_pegawai_id
 * @property integer $mb_golongan_id
 * @property string $mb_pegawai_has_golongan_mulai
 * @property string $mb_pegawai_has_golongan_akhir
 * @property string $mb_pegawai_has_golongan_file
 * @property string $mb_pegawai_has_golongan_created_at
 *
 * @property MbGolongan $mbGolongan
 * @property MbPegawai $mbPegawai
 */
class MbPegawaiHasGolongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_golongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_golongan_id'], 'required'],
            [['mb_pegawai_id', 'mb_golongan_id'], 'integer'],
            [['mb_pegawai_has_golongan_mulai', 'mb_pegawai_has_golongan_akhir', 'mb_pegawai_has_golongan_created_at'], 'safe'],
            [['mb_pegawai_has_golongan_file'], 'string', 'max' => 45],
            [['mb_golongan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbGolongan::className(), 'targetAttribute' => ['mb_golongan_id' => 'mb_golongan_id']],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_golongan_id' => 'Mb Pegawai Has Golongan ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_golongan_id' => 'Mb Golongan ID',
            'mb_pegawai_has_golongan_mulai' => 'Mb Pegawai Has Golongan Mulai',
            'mb_pegawai_has_golongan_akhir' => 'Mb Pegawai Has Golongan Akhir',
            'mb_pegawai_has_golongan_file' => 'Mb Pegawai Has Golongan File',
            'mb_pegawai_has_golongan_created_at' => 'Mb Pegawai Has Golongan Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbGolongan()
    {
        return $this->hasOne(MbGolongan::className(), ['mb_golongan_id' => 'mb_golongan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawai()
    {
        return $this->hasOne(MbPegawai::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }
}
