<?php

namespace backend\models\customs;

use Yii;


/**
* 
*/
class Rkpd extends \yii\db\ActiveRecord
{
	public static function Kegiatan($ta, $id_skpd, $id_jenis_urus, $id_urus, $id_prog)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT renj.*, bupati.*, uraip.*,
				urusj.*, 
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
					LEFT JOIN mb_uraian_pekerjaan AS uraip ON renj.mb_renja_id = uraip.mb_renja_id
					LEFT JOIN mb_lokasi_pekerjaan AS lok ON uraip.mb_uraian_pekerjaan_id = lok.mb_uraian_pekerjaan_id
					LEFT JOIN mb_kelurahan_desa AS desa ON lok.mb_kelurahan_desa_id = desa.mb_kelurahan_desa_id
					LEFT JOIN mb_kecamatan AS camat ON desa.mb_kecamatan_id = camat.mb_kecamatan_id
					LEFT JOIN mb_kabupaten_kota AS bupati ON camat.mb_kabupaten_kota_id = bupati.mb_kabupaten_kota_id
					WHERE ta.mb_tahun_anggaran_nama=:ta 
						AND skpd.mb_skpd_id=:opd 
						AND urusj.mb_urusan_jenis_id=:uj 
						AND urus.mb_urusan_id=:urus
						AND prog.mb_program_id=:prog
					GROUP BY prog.mb_program_id")
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

	public static function getUrusanJenis($ta, $id_skpd)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urusj.mb_urusan_jenis_id AS id, 
					CONCAT(urusj.mb_urusan_jenis_kode,' - ', urusj.mb_urusan_jenis_nama) AS nama
				FROM mb_renja AS renja
				JOIN mb_tahun_anggaran AS ta USING(mb_tahun_anggaran_id)
				JOIN mb_kegiatan AS giat USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
				JOIN mb_skpd AS skpd USING(mb_skpd_id)
				JOIN mb_urusan AS urus USING(mb_urusan_id)
				JOIN mb_urusan_jenis AS urusj USING(mb_urusan_jenis_id)
				WHERE ta.mb_tahun_anggaran_nama=:ta
					AND skpd.mb_skpd_id=:opd
				GROUP BY urusj.mb_urusan_jenis_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->queryAll();

		return $queryAll;
	}

	public static function getUrusan($ta, $id_skpd, $id_jenis_urus)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT urus.mb_urusan_id AS id, CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,' - ',urus.mb_urusan_nama) AS nama
				FROM mb_renja AS renja
				JOIN mb_tahun_anggaran AS ta USING(mb_tahun_anggaran_id)
				JOIN mb_kegiatan AS giat USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
				JOIN mb_skpd AS skpd USING(mb_skpd_id)
				JOIN mb_urusan AS urus USING(mb_urusan_id)
				JOIN mb_urusan_jenis AS urusj USING(mb_urusan_jenis_id)
				WHERE ta.mb_tahun_anggaran_nama=:ta
					AND skpd.mb_skpd_id=:opd
					AND urusj.mb_urusan_jenis_id=:jurus
				GROUP BY urus.mb_urusan_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':jurus', $id_jenis_urus)
			->queryAll();

		return $queryAll;
	}

	public static function getSkpd($ta, $id_skpd, $id_jenis_urus, $id_urus)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT hskpd.mb_urusan_has_skpd_id AS id, 
					CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,' - ',skpd.mb_skpd_nama) AS nama
				FROM mb_renja AS renja
				JOIN mb_tahun_anggaran AS ta USING(mb_tahun_anggaran_id)
				JOIN mb_kegiatan AS giat USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
				JOIN mb_skpd AS skpd USING(mb_skpd_id)
				JOIN mb_urusan AS urus USING(mb_urusan_id)
				JOIN mb_urusan_jenis AS urusj USING(mb_urusan_jenis_id)
				WHERE ta.mb_tahun_anggaran_nama=:ta
					AND skpd.mb_skpd_id=:opd
					AND urusj.mb_urusan_jenis_id=:jurus
                    AND hskpd.mb_urusan_id=:urus
				GROUP BY skpd.mb_skpd_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':jurus', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->queryAll();

		return $queryAll;
	}

	public static function getProgram($ta, $id_skpd, $id_jenis_urus, $id_urus, $id_has_skpd)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT prog.mb_program_id AS id, 
					CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,' - ',prog.mb_program_nama) AS nama
				FROM mb_renja AS renja
				JOIN mb_tahun_anggaran AS ta USING(mb_tahun_anggaran_id)
				JOIN mb_kegiatan AS giat USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
				JOIN mb_skpd AS skpd USING(mb_skpd_id)
				JOIN mb_urusan AS urus USING(mb_urusan_id)
				JOIN mb_urusan_jenis AS urusj USING(mb_urusan_jenis_id)
				WHERE ta.mb_tahun_anggaran_nama=:ta
					AND skpd.mb_skpd_id=:opd
					AND urusj.mb_urusan_jenis_id=:jurus
                    AND hskpd.mb_urusan_id=:urus
                    AND hskpd.mb_urusan_has_skpd_id=:skpd
				GROUP BY prog.mb_program_id")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':jurus', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->bindValue(':skpd', $id_has_skpd)
			->queryAll();

		return $queryAll;
	}

	public static function getKegiatan($ta, $id_skpd, $id_jenis_urus, $id_urus, $id_has_skpd, $id_prog)
	{
		$queryAll = Yii::$app->db->createCommand("SELECT CONCAT(urusj.mb_urusan_jenis_kode,'.',urus.mb_urusan_kode,'.',skpd.mb_skpd_kode,'.',prog.mb_program_kode,'.',giat.mb_kegiatan_kode) AS kode,
				giat.mb_kegiatan_nama AS nama, bupati.mb_kabupaten_nama AS kab, renja.mb_renja_target_capaian AS target,
				urai.mb_uraian_pekerjaan_vol AS vol, urai.mb_uraian_pekerjaan_harga_satuan AS harga,
				urai.mb_uraian_pekerjaan_pagu_tahun_maju AS pagum,
				renja.mb_renja_indikator_kegiatan AS indikator
				FROM mb_renja AS renja
				JOIN mb_tahun_anggaran AS ta USING(mb_tahun_anggaran_id)
				JOIN mb_kegiatan AS giat USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
				JOIN mb_skpd AS skpd USING(mb_skpd_id)
				JOIN mb_urusan AS urus USING(mb_urusan_id)
				JOIN mb_urusan_jenis AS urusj USING(mb_urusan_jenis_id)
				JOIN mb_uraian_pekerjaan AS urai  ON renja.mb_renja_id = urai.mb_renja_id
				JOIN mb_lokasi_pekerjaan AS lokasi ON urai.mb_uraian_pekerjaan_id = lokasi.mb_lokasi_pekerjaan_id
				JOIN mb_kelurahan_desa AS desa USING(mb_kelurahan_desa_id)
				JOIN mb_kecamatan AS camat USING(mb_kecamatan_id)
				JOIN mb_kabupaten_kota AS bupati USING(mb_kabupaten_kota_id)
				WHERE ta.mb_tahun_anggaran_nama=:ta
					AND skpd.mb_skpd_id=:opd
					AND urusj.mb_urusan_jenis_id=:jurus
                    AND hskpd.mb_urusan_id=:urus
                    AND hskpd.mb_urusan_has_skpd_id=:skpd
                    AND prog.mb_program_id=:prog")
			->bindValue(':ta', $ta)
			->bindValue(':opd', $id_skpd)
			->bindValue(':jurus', $id_jenis_urus)
			->bindValue(':urus', $id_urus)
			->bindValue(':skpd', $id_has_skpd)
			->bindValue(':prog', $id_prog)
			->queryAll();

		return $queryAll;
	}
}