<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_golongan".
 *
 * @property integer $mb_golongan_id
 * @property string $mb_golongan_nama
 * @property string $mb_golongan_ket
 *
 * @property MbPegawaiHasGolongan[] $mbPegawaiHasGolongans
 */
class MbGolongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_golongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_golongan_id'], 'required'],
            [['mb_golongan_id'], 'integer'],
            [['mb_golongan_nama', 'mb_golongan_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_golongan_id' => 'Mb Golongan ID',
            'mb_golongan_nama' => 'Mb Golongan Nama',
            'mb_golongan_ket' => 'Mb Golongan Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiHasGolongans()
    {
        return $this->hasMany(MbPegawaiHasGolongan::className(), ['mb_golongan_id' => 'mb_golongan_id']);
    }
}
