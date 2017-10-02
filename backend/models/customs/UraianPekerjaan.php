<?php

namespace backend\models\customs;

use backend\models\MbUraianPekerjaan;

/**
* extend backend\models\MbUraianPekerjaan;
*/
class UraianPekerjaan extends MbUraianPekerjaan
{
	public function getMbLokasiPekerjaan()
	{
		return $this->hasOne(LokasiPekerjaan::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
	}

	public function getMbUraianPekerjaanHasStatus()
    {
        return $this->hasOne(UraianPekerjaanHasStatus::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
    }
}