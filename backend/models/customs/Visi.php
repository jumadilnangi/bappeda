<?php

namespace backend\models\customs;

use backend\models\MbRpjmdVisi;

/**
* extend backend\models\MbRpjmdVisi;
*/
class Visi extends MbRpjmdVisi
{
	public function rules()
    {
        return [
            [['mb_rpjmd_visi_isi', 'mb_rpjmd_visi_awal', 'mb_rpjmd_visi_akhir'], 'required'],
            [['mb_rpjmd_visi_isi'], 'string'],
            //[['mb_rpjmd_visi_awal', 'mb_rpjmd_visi_akhir'], 'safe'],
            [['mb_rpjmd_visi_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_visi_awal', 'mb_rpjmd_visi_akhir'], 'number', 'min' => 4],
        ];
    }
}