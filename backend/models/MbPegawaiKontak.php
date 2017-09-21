<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_kontak".
 *
 * @property integer $mb_pegawai_kontak_id
 * @property string $mb_pegawai_kontak_nama
 *
 * @property MbPegawaiHasKontak[] $mbPegawaiHasKontaks
 */
class MbPegawaiKontak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_kontak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_kontak_id'], 'required'],
            [['mb_pegawai_kontak_id'], 'integer'],
            [['mb_pegawai_kontak_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_kontak_id' => 'Mb Pegawai Kontak ID',
            'mb_pegawai_kontak_nama' => 'Mb Pegawai Kontak Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasKontaks()
    {
        return $this->hasMany(MbPegawaiHasKontak::className(), ['mb_pegawai_kontak_id' => 'mb_pegawai_kontak_id']);
    }
}
