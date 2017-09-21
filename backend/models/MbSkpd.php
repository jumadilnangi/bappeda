<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_skpd".
 *
 * @property integer $mb_skpd_id
 * @property string $mb_skpd_kode
 * @property string $mb_skpd_nama
 * @property string $mb_skpd_singkatan
 * @property string $mb_skpd_ket
 *
 * @property MbPengguna[] $mbPenggunas
 * @property MbSkpdHasPegawai[] $mbSkpdHasPegawais
 * @property MbUrusanHasSkpd[] $mbUrusanHasSkpds
 */
class MbSkpd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_skpd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_kode', 'mb_skpd_singkatan', 'mb_skpd_ket'], 'string', 'max' => 45],
            [['mb_skpd_nama'], 'string', 'max' => 245],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_skpd_id' => 'ID',
            'mb_skpd_kode' => 'Kode',
            'mb_skpd_nama' => 'Nama SKPD',
            'mb_skpd_singkatan' => 'Singkatan',
            'mb_skpd_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPenggunas()
    {
        return $this->hasMany(MbPengguna::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpdHasPegawais()
    {
        return $this->hasMany(MbSkpdHasPegawai::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusanHasSkpds()
    {
        return $this->hasMany(MbUrusanHasSkpd::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }
}
