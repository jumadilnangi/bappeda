<?php

namespace backend\models\customs;

use backend\models\MbRpjmdTujuan;

/**
* extend backend\models\MbRpjmdTujuan;
*/
class Tujuan extends MbRpjmdTujuan
{
	public function rules()
    {
        return [
            [['mb_rpjmd_misi_id', 'mb_tujuan_isi'], 'required'],
            [['mb_rpjmd_misi_id'], 'integer'],
            [['mb_tujuan_isi'], 'string'],
            [['mb_tujuan_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_misi_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\MbRpjmdMisi::className(), 'targetAttribute' => ['mb_rpjmd_misi_id' => 'mb_rpjmd_misi_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mb_rpjmd_tujuan_id' => 'ID Tujuan ',
            'mb_rpjmd_misi_id' => 'Misi',
            'mb_tujuan_isi' => 'Tujuan ',
            'mb_tujuan_ket' => 'Keterangan',
        ];
    }
}