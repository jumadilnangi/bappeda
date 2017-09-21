<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pendidikan_tingkat".
 *
 * @property integer $mb_pendidikan_tingkat_id
 * @property string $mb_pendidikan_tingkat_nama
 * @property string $mb_pendidikan_tingkat_singkatan
 *
 * @property MbPegawaiHasPendidikan[] $mbPegawaiHasPendidikans
 */
class MbPendidikanTingkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pendidikan_tingkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pendidikan_tingkat_nama'], 'string', 'max' => 145],
            [['mb_pendidikan_tingkat_singkatan'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pendidikan_tingkat_id' => 'Mb Pendidikan Tingkat ID',
            'mb_pendidikan_tingkat_nama' => 'Mb Pendidikan Tingkat Nama',
            'mb_pendidikan_tingkat_singkatan' => 'Mb Pendidikan Tingkat Singkatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasPendidikans()
    {
        return $this->hasMany(MbPegawaiHasPendidikan::className(), ['mb_pendidikan_tingkat_id' => 'mb_pendidikan_tingkat_id']);
    }
}
