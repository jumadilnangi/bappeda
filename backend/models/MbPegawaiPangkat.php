<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_pangkat".
 *
 * @property integer $mb_pegawai_pangkat_id
 * @property string $mb_pegawai_pangkat_nama
 * @property string $mb_pegawai_pangkat_ket
 *
 * @property MbPegawaiHasPangkat[] $mbPegawaiHasPangkats
 */
class MbPegawaiPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_pangkat_id'], 'required'],
            [['mb_pegawai_pangkat_id'], 'integer'],
            [['mb_pegawai_pangkat_nama', 'mb_pegawai_pangkat_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_pangkat_id' => 'Mb Pegawai Pangkat ID',
            'mb_pegawai_pangkat_nama' => 'Mb Pegawai Pangkat Nama',
            'mb_pegawai_pangkat_ket' => 'Mb Pegawai Pangkat Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasPangkats()
    {
        return $this->hasMany(MbPegawaiHasPangkat::className(), ['m_pegawai_pangkat_id' => 'mb_pegawai_pangkat_id']);
    }
}
