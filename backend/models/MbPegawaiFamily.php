<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_family".
 *
 * @property integer $mb_pegawai_family_id
 * @property string $mb_pegawai_family_nama
 * @property string $mb_pegawai_family_ket
 *
 * @property MbPegawaiHasFamily[] $mbPegawaiHasFamilies
 */
class MbPegawaiFamily extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_family';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_family_nama', 'mb_pegawai_family_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_family_id' => 'Mb Pegawai Family ID',
            'mb_pegawai_family_nama' => 'Mb Pegawai Family Nama',
            'mb_pegawai_family_ket' => 'Mb Pegawai Family Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasFamilies()
    {
        return $this->hasMany(MbPegawaiHasFamily::className(), ['mb_pegawai_family_id' => 'mb_pegawai_family_id']);
    }
}
