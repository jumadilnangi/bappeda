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
            'mb_rpjmd_sasaran_id' => 'Sasaran ',
            'mb_indikator_kinerja_isi' => 'Indikator Kinerja ',
            'mb_indikator_kinerja_satuan' => 'Satuan',
            'mb_indikator_kinerja_awal' => 'Keadaan Awal',
            'mb_indikator_kinerja_target_1' => 'Target Tahun 1',
            'mb_indikator_kinerja_target_2' => 'Target Tahun 2',
            'mb_indikator_kinerja_target_3' => 'Target Tahun 3',
            'mb_indikator_kinerja_target_4' => 'Target Tahun 4',
            'mb_indikator_kinerja_target_5' => 'Target Tahun 5',
            'mb_indikator_kinerja_ket' => 'Ket.',
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
