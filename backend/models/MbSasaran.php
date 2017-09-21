<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_sasaran".
 *
 * @property integer $mb_sasaran_id
 * @property integer $mb_prioritas_id
 * @property string $mb_sasaran_nama
 * @property string $mb_sasaran_ket
 *
 * @property MbIndikatorKinerja[] $mbIndikatorKinerjas
 * @property MbRenja[] $mbRenjas
 * @property MbPrioritas $mbPrioritas
 */
class MbSasaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_sasaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_prioritas_id'], 'required'],
            [['mb_prioritas_id'], 'integer'],
            [['mb_sasaran_nama'], 'string', 'max' => 345],
            [['mb_sasaran_ket'], 'string', 'max' => 45],
            [['mb_prioritas_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPrioritas::className(), 'targetAttribute' => ['mb_prioritas_id' => 'mb_prioritas_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_sasaran_id' => 'Sasaran',
            'mb_prioritas_id' => 'Mb Prioritas ID',
            'mb_sasaran_nama' => 'Sasaran ',
            'mb_sasaran_ket' => 'Mb Sasaran Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbIndikatorKinerjas()
    {
        return $this->hasMany(MbIndikatorKinerja::className(), ['mb_sasaran_id' => 'mb_sasaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRenjas()
    {
        return $this->hasMany(MbRenja::className(), ['mb_sasaran_id' => 'mb_sasaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPrioritas()
    {
        return $this->hasOne(MbPrioritas::className(), ['mb_prioritas_id' => 'mb_prioritas_id']);
    }
}
