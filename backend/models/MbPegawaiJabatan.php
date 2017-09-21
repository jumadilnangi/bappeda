<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_jabatan".
 *
 * @property integer $mb_pegawai_jabatan_id
 * @property string $mb_pegawai_jabatan_nama
 *
 * @property MbSkpdHasPegawai[] $mbSkpdHasPegawais
 */
class MbPegawaiJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_jabatan_nama'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_jabatan_id' => 'Mb Pegawai Jabatan ID',
            'mb_pegawai_jabatan_nama' => 'Mb Pegawai Jabatan Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpdHasPegawais()
    {
        return $this->hasMany(MbSkpdHasPegawai::className(), ['mb_pegawai_jabatan_id' => 'mb_pegawai_jabatan_id']);
    }
}
