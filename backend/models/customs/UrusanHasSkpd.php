<?php

namespace backend\models\customs;

use backend\models\MbUrusanHasSkpd;

/**
* extend backend\models\MbUrusanHasSkpd
*/
class UrusanHasSkpd extends MbUrusanHasSkpd
{
	public function rules()
	{
		return [
			[['mb_urusan_id'], 'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'mb_urusan_has_skpd_id' => 'OPD',
			'mb_urusan_id' => 'Unit Kerja',
			'mb_skpd_id' => 'OPD',
			'mb_urusan_has_skpd_mulai' => 'Mulai',
			'mb_urusan_has_skpd_akhir' => ' Akhir',
			'mb_urusan_has_skpd_sk' => 'SK',
			'mb_urusan_has_skpd_ket' => 'Keterangan',
		];
	}
}