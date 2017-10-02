<?php

namespace backend\models\customs;

use backend\models\MbUraianStatus;

/**
* extend backend\models\MbUraianStatus;
*/
class UraianStatus extends MbUraianStatus
{
	public function attributeLabels()
	{
		return [
			'mb_uraian_status_id' => 'Uraian Status',
			'mb_uraian_status_nama' => 'Nama Uraian Status',
		];
	}
}