<?php

namespace backend\models\customs;

use backend\models\MbRenja;

/**
* extend backend\models\MbRenja;
*/
class Renja extends MbRenja
{
	public function attributeLabels()
	{
		return [
			'mb_renja_id' => 'ID Renja',
			'mb_tahun_anggaran_id' => 'Tahun Anggaran',
			'mb_kegiatan_id' => 'Kegiatan ',
			'mb_sasaran_id' => 'Sasaran Daerah',
			'mb_renja_indikator_kegiatan' => 'Indikator Kegiatan',
			'mb_renja_pagu_indikatif' => 'Pagu Indikatif',
			'mb_renja_indikator_keg' => 'Indikator Kegiatan',
			'mb_renja_sasaran_keg' => 'Sasaran Kegiatan',
			'mb_renja_hasil_prog_tolak_ukur' => 'Hasil Program',
			'mb_renja_hasil_prog_target_kerja' => 'Hasil Program',
			'mb_renja_keluaran_tolak_ukur' => 'Keluaran',
			'mb_renja_keluaran_tolak_target_kerja' => 'Keluaran',
			'mb_renja_hasil_kerja_tolak_ukur' => 'Hasil Kerja',
			'mb_renja_hasil_kerja_tolak_target_kerja' => 'Hasil Kerja',
			'mb_renja_target_capaian' => 'Target Capaian',
			'mb_renja_target_capaian_thn_maju' => 'Target Capaian (Tahun Maju)',
			'mb_renja_ket' => 'Keterangan',
		];
	}
}