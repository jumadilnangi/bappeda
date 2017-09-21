<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_prioritas".
 *
 * @property integer $mb_prioritas_id
 * @property string $mb_prioritas_nama
 * @property integer $mb_prioritas_no_urut
 * @property string $mb_prioritas_ket
 *
 * @property MbSasaran[] $mbSasarans
 */
class MbPrioritas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_prioritas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_prioritas_no_urut'], 'integer'],
            [['mb_prioritas_nama'], 'string', 'max' => 345],
            [['mb_prioritas_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_prioritas_id' => 'Mb Prioritas ID',
            'mb_prioritas_nama' => 'Mb Prioritas Nama',
            'mb_prioritas_no_urut' => 'Mb Prioritas No Urut',
            'mb_prioritas_ket' => 'Mb Prioritas Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSasarans()
    {
        return $this->hasMany(MbSasaran::className(), ['mb_prioritas_id' => 'mb_prioritas_id']);
    }
}
