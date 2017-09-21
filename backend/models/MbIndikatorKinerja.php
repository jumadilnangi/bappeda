<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_indikator_kinerja".
 *
 * @property integer $mb_indikator_kinerja_id
 * @property integer $mb_rpjmd_sasaran_id
 * @property string $mb_indikator_kinerja_isi
 * @property string $mb_indikator_kinerja_satuan
 * @property string $mb_indikator_kinerja_awal
 * @property integer $mb_indikator_kinerja_target_1
 * @property integer $mb_indikator_kinerja_target_2
 * @property integer $mb_indikator_kinerja_target_3
 * @property integer $mb_indikator_kinerja_target_4
 * @property integer $mb_indikator_kinerja_target_5
 * @property string $mb_indikator_kinerja_ket
 *
 * @property MbRpjmdSasaran $mbRpjmdSasaran
 */
class MbIndikatorKinerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_indikator_kinerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rpjmd_sasaran_id'], 'required'],
            [['mb_rpjmd_sasaran_id', 'mb_indikator_kinerja_target_1', 'mb_indikator_kinerja_target_2', 'mb_indikator_kinerja_target_3', 'mb_indikator_kinerja_target_4', 'mb_indikator_kinerja_target_5'], 'integer'],
            [['mb_indikator_kinerja_isi'], 'string'],
            [['mb_indikator_kinerja_satuan', 'mb_indikator_kinerja_awal', 'mb_indikator_kinerja_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_sasaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRpjmdSasaran::className(), 'targetAttribute' => ['mb_rpjmd_sasaran_id' => 'mb_rpjmd_sasaran_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_indikator_kinerja_id' => 'Mb Indikator Kinerja ID',
            'mb_rpjmd_sasaran_id' => 'Mb Rpjmd Sasaran ID',
            'mb_indikator_kinerja_isi' => 'Mb Indikator Kinerja Isi',
            'mb_indikator_kinerja_satuan' => 'Mb Indikator Kinerja Satuan',
            'mb_indikator_kinerja_awal' => 'Mb Indikator Kinerja Awal',
            'mb_indikator_kinerja_target_1' => 'Mb Indikator Kinerja Target 1',
            'mb_indikator_kinerja_target_2' => 'Mb Indikator Kinerja Target 2',
            'mb_indikator_kinerja_target_3' => 'Mb Indikator Kinerja Target 3',
            'mb_indikator_kinerja_target_4' => 'Mb Indikator Kinerja Target 4',
            'mb_indikator_kinerja_target_5' => 'Mb Indikator Kinerja Target 5',
            'mb_indikator_kinerja_ket' => 'Mb Indikator Kinerja Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRpjmdSasaran()
    {
        return $this->hasOne(MbRpjmdSasaran::className(), ['mb_rpjmd_sasaran_id' => 'mb_rpjmd_sasaran_id']);
    }
}
