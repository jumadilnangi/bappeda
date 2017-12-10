<?php

namespace backend\models\customs;

use backend\models\MbRpjmdSasaran;

/**
* extend backend\models\MbRpjmdSasaran;
*/
class Sasaran extends MbRpjmdSasaran
{
	public function rules()
    {
        return [
            [['mb_rpjmd_tujuan_id', 'mb_sasaran_isi'], 'required'],
            [['mb_rpjmd_tujuan_id'], 'integer'],
            [['mb_sasaran_isi'], 'string'],
            [['mb_sasaran_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_tujuan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\MbRpjmdTujuan::className(), 'targetAttribute' => ['mb_rpjmd_tujuan_id' => 'mb_rpjmd_tujuan_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mb_rpjmd_sasaran_id' => 'ID Sasaran',
            'mb_rpjmd_tujuan_id' => 'Tujuan',
            'mb_sasaran_isi' => 'Sasaran',
            'mb_sasaran_ket' => 'Keterangan',
        ];
    }
}