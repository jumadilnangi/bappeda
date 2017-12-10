<?php

namespace backend\models\customs;

use backend\models\MbIndikatorKinerja;

/**
* extend backend\models\MbIndikatorKinerja;
*/
class IndikatorKinerja extends MbIndikatorKinerja
{
	public function rules()
    {
        return [
            [['mb_rpjmd_sasaran_id', 'mb_indikator_kinerja_isi', 'mb_indikator_kinerja_satuan', 'mb_indikator_kinerja_awal', 'mb_indikator_kinerja_target_1', 'mb_indikator_kinerja_target_2', 'mb_indikator_kinerja_target_3', 'mb_indikator_kinerja_target_4', 'mb_indikator_kinerja_target_5'], 'required'],
            [['mb_rpjmd_sasaran_id', 'mb_indikator_kinerja_target_1', 'mb_indikator_kinerja_target_2', 'mb_indikator_kinerja_target_3', 'mb_indikator_kinerja_target_4', 'mb_indikator_kinerja_target_5'], 'integer'],
            [['mb_indikator_kinerja_isi'], 'string'],
            [['mb_indikator_kinerja_satuan', 'mb_indikator_kinerja_awal', 'mb_indikator_kinerja_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_sasaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\MbRpjmdSasaran::className(), 'targetAttribute' => ['mb_rpjmd_sasaran_id' => 'mb_rpjmd_sasaran_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mb_indikator_kinerja_id' => 'ID Indikator Kinerja',
            'mb_rpjmd_sasaran_id' => 'Sasaran ',
            'mb_indikator_kinerja_isi' => 'Indikator Kinerja',
            'mb_indikator_kinerja_satuan' => 'Satuan',
            'mb_indikator_kinerja_awal' => 'Keadaan Awal',
            'mb_indikator_kinerja_target_1' => 'Target Tahun 1',
            'mb_indikator_kinerja_target_2' => 'Target Tahun 2',
            'mb_indikator_kinerja_target_3' => 'Target Tahun 3',
            'mb_indikator_kinerja_target_4' => 'Target Tahun 4',
            'mb_indikator_kinerja_target_5' => 'Target Tahun 5',
            'mb_indikator_kinerja_ket' => 'Keterangan',
        ];
    }
}