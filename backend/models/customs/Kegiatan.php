<?php

namespace backend\models\customs;

use backend\models\MbKegiatan;

/**
* extend backend\models\MbKegiatan;
*/
class Kegiatan extends MbKegiatan
{
	public function attributeLabels()
	{
		return [
			'mb_kegiatan_id' => 'Kegiatan',
			'mb_program_id' => 'ID Program',
			'mb_kegiatan_kode' => 'Kode Kegiatan',
			'mb_kegiatan_nama' => 'Nama Kegiatan',
			'mb_kegiatan_ket' => 'Keterangan',
		];
	}
}