<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_program_has_prioritas_nasional".
 *
 * @property integer $mb_program_has_prioritas_nasional_id
 * @property integer $mb_program_id
 * @property integer $mb_prioritas_nasional_id
 * @property string $mb_program_has_prioritas_nasional_awal
 * @property string $mb_program_has_prioritas_nasional_akhir
 * @property string $mb_program_has_prioritas_nasional_ket
 *
 * @property MbPrioritasNasional $mbPrioritasNasional
 * @property MbProgram $mbProgram
 */
class MbProgramHasPrioritasNasional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_program_has_prioritas_nasional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_program_id', 'mb_prioritas_nasional_id'], 'required'],
            [['mb_program_id', 'mb_prioritas_nasional_id'], 'integer'],
            [['mb_program_has_prioritas_nasional_awal', 'mb_program_has_prioritas_nasional_akhir'], 'safe'],
            [['mb_program_has_prioritas_nasional_ket'], 'string', 'max' => 45],
            [['mb_prioritas_nasional_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPrioritasNasional::className(), 'targetAttribute' => ['mb_prioritas_nasional_id' => 'mb_prioritas_nasional_id']],
            [['mb_program_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbProgram::className(), 'targetAttribute' => ['mb_program_id' => 'mb_program_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_program_has_prioritas_nasional_id' => 'ID Sinrkonisai',
            'mb_program_id' => 'Program Daerah',
            'mb_prioritas_nasional_id' => 'Prioritas Nasional ',
            'mb_program_has_prioritas_nasional_awal' => 'Tahun Mulai ',
            'mb_program_has_prioritas_nasional_akhir' => 'Tahun Berakhir',
            'mb_program_has_prioritas_nasional_ket' => 'Ket.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPrioritasNasional()
    {
        return $this->hasOne(MbPrioritasNasional::className(), ['mb_prioritas_nasional_id' => 'mb_prioritas_nasional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbProgram()
    {
        return $this->hasOne(MbProgram::className(), ['mb_program_id' => 'mb_program_id']);
    }
}
