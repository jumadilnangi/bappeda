<?php

namespace backend\models\customs;

use backend\models\MbPrioritas;

/**
* extend backend\models\MbPrioritas;
*/
class Prioritas extends MbPrioritas
{
	public function rules()
	{
		return [
			[['mb_prioritas_id'], 'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'mb_prioritas_id' => 'Prioritas',
			'mb_prioritas_nama' => 'Nama Prioritas',
			'mb_prioritas_no_urut' => 'Mb Prioritas No Urut',
			'mb_prioritas_ket' => 'Mb Prioritas Ket',
		];
	}	
}