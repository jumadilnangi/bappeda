<?php

namespace backend\models\customs;

use backend\models\MbRpjmdMisi;

/**
* extend backend\models\MbRpjmdMisi;
*/
class Misi extends MbRpjmdMisi
{
	public function rules()
    {
        return [
            [['mb_rpjmd_visi_id', 'mb_rpjmd_misi_isi'], 'required'],
            [['mb_rpjmd_visi_id'], 'integer'],
            [['mb_rpjmd_misi_isi'], 'string'],
            [['mb_rpjmd_misi_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_visi_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\MbRpjmdVisi::className(), 'targetAttribute' => ['mb_rpjmd_visi_id' => 'mb_rpjmd_visi_id']],
        ];
    }
}