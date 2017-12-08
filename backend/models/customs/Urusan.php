<?php

namespace backend\models\customs;

use backend\models\MbUrusan;

/**
* extend backend\models\MbUrusan
*/
class Urusan extends MbUrusan
{
	public function rules()
	{
		return [
			[['mb_urusan_id', ], 'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'mb_urusan_id' => 'Unit Kerja',
			'mb_urusan_jenis_id' => 'Jenis Urusan',
			'mb_urusan_kode' => 'Kode Urusan',
			'mb_urusan_nama' => 'Nama Urusan',
			'mb_urusan_ket' => 'Keterangan',
		];
	}
}