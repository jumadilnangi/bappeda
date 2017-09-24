<?php

namespace backend\models\customs;

use backend\models\MbRekeningStruk;

/**
* extend backend\models\MbRekeningStruk;
*/
class RekeningStruk extends MbRekeningStruk
{
	public function rules()
	{
		return [
			[['mb_rekening_struk_id'], 'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'mb_rekening_struk_id' => 'Struk Rekening ',
			'mb_rekening_struk_kode' => 'Kode Struk Rekening',
			'mb_rekening_struk_nama' => 'Nama Struk Rekening ',
			'mb_rekening_struk_ket' => 'Keterangan Struk Rekening ',
		];
	}
}