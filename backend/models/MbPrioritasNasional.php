<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_prioritas_nasional".
 *
 * @property integer $mb_prioritas_nasional_id
 * @property string $mb_prioritas_nasional_kode
 * @property string $mb_prioritas_nasional_nama
 * @property string $mb_prioritas_nasional_ket
 *
 * @property MbProgramHasPrioritasNasional[] $mbProgramHasPrioritasNasionals
 */
class MbPrioritasNasional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_prioritas_nasional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['mb_prioritas_nasional_id'], 'integer'],
            [['mb_prioritas_nasional_nama'], 'string'],
            [['mb_prioritas_nasional_kode', 'mb_prioritas_nasional_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_prioritas_nasional_id' => 'ID Prioritas Nasional ',
            'mb_prioritas_nasional_kode' => 'Kode',
            'mb_prioritas_nasional_nama' => 'Nama',
            'mb_prioritas_nasional_ket' => 'Ket.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbProgramHasPrioritasNasionals()
    {
        return $this->hasMany(MbProgramHasPrioritasNasional::className(), ['mb_prioritas_nasional_id' => 'mb_prioritas_nasional_id']);
    }
}
