<?php

namespace backend\models\customs;

use Yii;


/**
* 
*/
class Rkpd extends \yii\db\ActiveRecord
{

	public function uraianPekerjaan($id_renja)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urai.*, bup.mb_kabupaten_nama
				FROM mb_uraian_pekerjaan AS urai
				JOIN mb_lokasi_pekerjaan AS lokasi ON urai.mb_uraian_pekerjaan_id = lokasi.mb_uraian_pekerjaan_id
				JOIN mb_kelurahan_desa AS kel ON lokasi.mb_kelurahan_desa_id = kel.mb_kelurahan_desa_id
				JOIN mb_kecamatan AS camat ON kel.mb_kecamatan_id = camat.mb_kecamatan_id
				JOIN mb_kabupaten_kota AS bup ON camat.mb_kabupaten_kota_id = bup.mb_kabupaten_kota_id
				WHERE urai.mb_renja_id = :id
				GROUP BY urai.mb_uraian_pekerjaan_id")
			->bindValue(':id', $id_renja)
			->queryAll();

		return $queryAll;
	}

	public static function Kegiatan($ta, $id_skpd, $id_jenis_urus, $id_urus, $id_prog)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT renj.*, urusj.*, 
				urus.mb_urusan_id, skpd.mb_skpd_id,
				prog.mb_program_id, keg.mb_kegiatan_id,
				CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',keg.mb_kegiatan_kode) AS keg_kode, keg.mb_kegiatan_nama
					FROM mb_renja AS renj 
					LEFT JOIN mb_tahun_anggaran AS ta ON renj.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
					LEFT JOIN mb_kegiatan AS keg ON renj.mb_kegiatan_id = keg.mb_kegiatan_id 
					LEFT JOIN mb_program AS prog ON keg.mb_program_id = prog.mb_program_id 
					LEFT JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
					LEFT JOIN mb_urusan AS urus ON hskpd.mb_urusan_id = urus.mb_urusan_id
					LEFT JOIN mb_urusan_jenis AS urusj ON urus.mb_urusan_jenis_id = urusj.mb_urusan_jenis_id
					LEFT JOIN mb_skpd AS skpd ON hskpd.mb_skpd_id = skpd.mb_skpd_id
					WHERE ta.mb_tahun_anggaran_nama=:ta 
						AND skpd.mb_skpd_id=:opd 
						AND urusj.mb_urusan_jenis_id=:uj 
						AND urus.mb_urusan_id=:urus
						AND prog.mb_program_id=:prog")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':uj', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->bindValue(':prog', $id_prog)
			->queryAll();

		return $queryAll;
	}

	public static function Program($ta, $id_skpd, $id_jenis_urus, $id_urus)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urusj.mb_urusan_jenis_id, urusj.mb_urusan_jenis_kode, urusj.mb_urusan_jenis_nama, 
					urus.mb_urusan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode) AS urus_kode, urus.mb_urusan_nama,
					skpd.mb_skpd_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode) AS skpd_kode, skpd.mb_skpd_nama,
					prog.mb_program_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,' - ', prog.mb_program_nama) AS prog_nama,
					keg.mb_kegiatan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',keg.mb_kegiatan_kode) AS keg_kode, keg.mb_kegiatan_nama
				FROM mb_renja AS renj 
				LEFT JOIN mb_tahun_anggaran AS ta ON renj.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
				LEFT JOIN mb_kegiatan AS keg ON renj.mb_kegiatan_id = keg.mb_kegiatan_id 
				LEFT JOIN mb_program AS prog ON keg.mb_program_id = prog.mb_program_id 
				LEFT JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
				LEFT JOIN mb_urusan AS urus ON hskpd.mb_urusan_id = urus.mb_urusan_id
				LEFT JOIN mb_urusan_jenis AS urusj ON urus.mb_urusan_jenis_id = urusj.mb_urusan_jenis_id
				LEFT JOIN mb_skpd AS skpd ON hskpd.mb_skpd_id = skpd.mb_skpd_id
				WHERE ta.mb_tahun_anggaran_nama=:ta 
					AND skpd.mb_skpd_id=:opd 
					AND urusj.mb_urusan_jenis_id=:uj 
					AND urus.mb_urusan_id=:urus
				GROUP BY prog.mb_program_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':uj', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->queryAll();

		return $queryAll;
	}

	public static function Skpd($ta, $id_skpd, $id_jenis_urus, $id_urus)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urusj.mb_urusan_jenis_id, urusj.mb_urusan_jenis_kode, urusj.mb_urusan_jenis_nama, 
					urus.mb_urusan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode) AS urus_kode, urus.mb_urusan_nama,
					skpd.mb_skpd_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,' - ',skpd.mb_skpd_nama) AS skpd_nama,
					prog.mb_program_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode) AS prog_kode, prog.mb_program_nama,
					keg.mb_kegiatan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',keg.mb_kegiatan_kode) AS keg_kode, keg.mb_kegiatan_nama
				FROM mb_renja AS renj 
				LEFT JOIN mb_tahun_anggaran AS ta ON renj.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
				LEFT JOIN mb_kegiatan AS keg ON renj.mb_kegiatan_id = keg.mb_kegiatan_id 
				LEFT JOIN mb_program AS prog ON keg.mb_program_id = prog.mb_program_id 
				LEFT JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
				LEFT JOIN mb_urusan AS urus ON hskpd.mb_urusan_id = urus.mb_urusan_id
				LEFT JOIN mb_urusan_jenis AS urusj ON urus.mb_urusan_jenis_id = urusj.mb_urusan_jenis_id
				LEFT JOIN mb_skpd AS skpd ON hskpd.mb_skpd_id = skpd.mb_skpd_id
				WHERE ta.mb_tahun_anggaran_nama=:ta 
					AND skpd.mb_skpd_id=:opd 
					AND urusj.mb_urusan_jenis_id=:uj 
					AND urus.mb_urusan_id=:urus
				GROUP BY skpd.mb_skpd_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':uj', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->queryAll();

		return $queryAll;
	}

	public static function Urusan($ta, $id_skpd, $id_jenis_urus)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urusj.mb_urusan_jenis_id, urusj.mb_urusan_jenis_kode, urusj.mb_urusan_jenis_nama, 
					urus.mb_urusan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,' - ', urus.mb_urusan_nama) AS urus_nama,
					skpd.mb_skpd_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode) AS skpd_kode, skpd.mb_skpd_nama,
					prog.mb_program_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode) AS prog_kode, prog.mb_program_nama,
					keg.mb_kegiatan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',keg.mb_kegiatan_kode) AS keg_kode, keg.mb_kegiatan_nama
				FROM mb_renja AS renj 
				LEFT JOIN mb_tahun_anggaran AS ta ON renj.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
				LEFT JOIN mb_kegiatan AS keg ON renj.mb_kegiatan_id = keg.mb_kegiatan_id 
				LEFT JOIN mb_program AS prog ON keg.mb_program_id = prog.mb_program_id 
				LEFT JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
				LEFT JOIN mb_urusan AS urus ON hskpd.mb_urusan_id = urus.mb_urusan_id
				LEFT JOIN mb_urusan_jenis AS urusj ON urus.mb_urusan_jenis_id = urusj.mb_urusan_jenis_id
				LEFT JOIN mb_skpd AS skpd ON hskpd.mb_skpd_id = skpd.mb_skpd_id
				WHERE ta.mb_tahun_anggaran_nama=:ta 
					AND skpd.mb_skpd_id=:opd 
					AND urusj.mb_urusan_jenis_id=:uj
				GROUP BY urus.mb_urusan_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':uj', $id_jenis_urus)
			->queryAll();

		return $queryAll;
	}

	public static function urusanJenis($ta, $id_skpd)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urusj.mb_urusan_jenis_id, CONCAT(urusj.mb_urusan_jenis_kode,' - ', urusj.mb_urusan_jenis_nama) AS jenis_nama, 
					urus.mb_urusan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode) AS urus_kode, urus.mb_urusan_nama,
					skpd.mb_skpd_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode) AS skpd_kode, skpd.mb_skpd_nama,
					prog.mb_program_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode) AS prog_kode, prog.mb_program_nama,
					keg.mb_kegiatan_id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',keg.mb_kegiatan_kode) AS keg_kode, keg.mb_kegiatan_nama
				FROM mb_renja AS renj 
				LEFT JOIN mb_tahun_anggaran AS ta ON renj.mb_tahun_anggaran_id = ta.mb_tahun_anggaran_id
				LEFT JOIN mb_kegiatan AS keg ON renj.mb_kegiatan_id = keg.mb_kegiatan_id 
				LEFT JOIN mb_program AS prog ON keg.mb_program_id = prog.mb_program_id 
				LEFT JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
				LEFT JOIN mb_urusan AS urus ON hskpd.mb_urusan_id = urus.mb_urusan_id
				LEFT JOIN mb_urusan_jenis AS urusj ON urus.mb_urusan_jenis_id = urusj.mb_urusan_jenis_id
				LEFT JOIN mb_skpd AS skpd ON hskpd.mb_skpd_id = skpd.mb_skpd_id
				WHERE ta.mb_tahun_anggaran_nama=:ta AND skpd.mb_skpd_id=:opd
				GROUP BY urusj.mb_urusan_jenis_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->queryAll();

		return $queryAll;
	}
}