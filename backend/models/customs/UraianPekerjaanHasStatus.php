<?php

namespace backend\models\customs;

use backend\models\MbUraianPekerjaanHasStatus;

/**
* extend backend\models\MbUraianPekerjaanHasStatus;
*/
class UraianPekerjaanHasStatus extends MbUraianPekerjaanHasStatus
{
	public function attributeLabels()
	{
		return [
			'mb_uraian_pekerjaan_has_status_id' => 'ID',
			'mb_uraian_pekerjaan_id' => 'Uraian Pekerjaan',
			'mb_uraian_status_id' => 'Status',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
		];
	}
}