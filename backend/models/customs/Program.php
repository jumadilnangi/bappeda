<?php

namespace backend\models\customs;

use backend\models\MbProgram;

/**
* extend backend\models\MbProgram;
*/
class Program extends MbProgram
{
	public function attributeLabels()
	{
		return [
			'mb_program_id' => 'Program',
			'mb_urusan_has_skpd_id' => 'SKPD',
			'mb_program_kode' => 'Kode Program',
			'mb_program_nama' => 'Nama Program',
			'mb_program_ket' => 'Keterangan',
		];
	}
}