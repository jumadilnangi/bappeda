<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_kontak".
 *
 * @property integer $mb_pegawai_has_kontak_id
 * @property integer $mb_pegawai_id
 * @property integer $mb_pegawai_kontak_id
 * @property string $mb_pegawai_has_kontak_nilai
 * @property string $mb_pegawai_has_kontak_ket
 * @property integer $mb_pegawai_has_kontak_urutan
 *
 * @property MbPegawai $mbPegawai
 * @property MbPegawaiKontak $mbPegawaiKontak
 */
class MbPegawaiHasKontak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_kontak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_pegawai_kontak_id'], 'required'],
            [['mb_pegawai_id', 'mb_pegawai_kontak_id', 'mb_pegawai_has_kontak_urutan'], 'integer'],
            [['mb_pegawai_has_kontak_nilai', 'mb_pegawai_has_kontak_ket'], 'string', 'max' => 145],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['mb_pegawai_kontak_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawaiKontak::className(), 'targetAttribute' => ['mb_pegawai_kontak_id' => 'mb_pegawai_kontak_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_kontak_id' => 'Mb Pegawai Has Kontak ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_pegawai_kontak_id' => 'Mb Pegawai Kontak ID',
            'mb_pegawai_has_kontak_nilai' => 'Mb Pegawai Has Kontak Nilai',
            'mb_pegawai_has_kontak_ket' => 'Mb Pegawai Has Kontak Ket',
            'mb_pegawai_has_kontak_urutan' => 'Mb Pegawai Has Kontak Urutan',
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
    public function getMbPegawaiKontak()
    {
        return $this->hasOne(MbPegawaiKontak::className(), ['mb_pegawai_kontak_id' => 'mb_pegawai_kontak_id']);
    }
}
