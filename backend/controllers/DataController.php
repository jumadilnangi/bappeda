<?php

namespace backend\controllers;


use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;

/**
* DataController. Kumpulan fungsi dengan output json.
* @copyright Yusuf Ayuba
* @since 1.0  
*/
class DataController extends Controller
{
	protected $_request;

	protected $_db;

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					//'*' => ['POST'],
				],
			],
		];
	}

	public function init()
	{
		$this->_request = Yii::$app->request;
		$this->_db = Yii::$app->db;
	}

	public function actionGetRole()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryRole = $this->_db->createCommand("SELECT name AS id, name AS text
				FROM auth_item
				WHERE (LOWER(name) LIKE :nama
					OR LOWER(description) LIKE :des)
					AND type=:tipe
				LIMIT :batas")
			->bindValue(':nama', '%'.strtolower($cari).'%')
			->bindValue(':des', '%'.strtolower($cari).'%')
			->bindValue(':tipe', 1)
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryRole;
		return $out;
	}

	public function actionGetlokasi()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryStruk = $this->_db->createCommand("SELECT kel.mb_kelurahan_desa_id AS id, CONCAT('Desa/Kelurahan ', kel.mb_kelurahan_desa_nama, ', Kecamatan ', kec.mb_kecamatan_nama, ', Kabupaten/Kota ', kab.mb_kabupaten_nama, ' Propinsi ',prov.mb_provinsi_nama) AS text
				FROM mb_kelurahan_desa AS kel
				JOIN mb_kecamatan AS kec USING(mb_kecamatan_id)
				JOIN mb_kabupaten_kota AS kab USING(mb_kabupaten_kota_id)
				JOIN mb_provinsi AS prov USING(mb_provinsi_id)
				WHERE LOWER(kel.mb_kelurahan_desa_nama) LIKE :cari
					OR LOWER(kec.mb_kecamatan_nama) LIKE :cari
				    OR LOWER(kab.mb_kabupaten_nama) LIKE :cari
				    OR LOWER(prov.mb_provinsi_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryStruk;
		return $out;
	}

	public function actionGetrenja()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);

		$query = '';
		$paramCari = '';
		$_idSession = Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id'];

		if (Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id']!='') {
			$query = "SELECT renja.mb_renja_id AS id, giat.mb_kegiatan_nama AS text
					FROM mb_renja AS renja
					JOIN mb_kegiatan AS giat ON renja.mb_kegiatan_id = giat.mb_kegiatan_id
					JOIN mb_program AS prog ON giat.mb_program_id = prog.mb_program_id
					JOIN mb_urusan_has_skpd AS hskpd ON prog.mb_urusan_has_skpd_id = hskpd.mb_urusan_has_skpd_id
					WHERE hskpd.mb_skpd_id = $_idSession AND
						(giat.mb_kegiatan_kode LIKE :cari
						OR giat.mb_kegiatan_nama LIKE :cari)
					LIMIT :batas";
			$paramCari = '%'.strtolower($cari).'%';
		} else {
			$query = "SELECT ren.mb_renja_id AS id, keg.mb_kegiatan_nama AS text
					FROM mb_renja AS ren
					JOIN mb_kegiatan AS keg USING(mb_kegiatan_id)
					JOIN mb_program AS prog USING(mb_program_id)
					WHERE keg.mb_kegiatan_kode LIKE :cari
						OR keg.mb_kegiatan_nama LIKE :cari
					LIMIT :batas";
			$paramCari = '%'.strtolower($cari).'%';
		}

		$queryStruk = $this->_db->createCommand($query)
			->bindValue(':cari', $paramCari)
			->bindValue(':batas', (int)$limit)
			->queryAll();
		
		/*$queryStruk = $this->_db->createCommand("SELECT ren.mb_renja_id AS id, keg.mb_kegiatan_nama AS text
				FROM mb_renja AS ren
				JOIN mb_kegiatan AS keg USING(mb_kegiatan_id)
				JOIN mb_program AS prog USING(mb_program_id)
				WHERE keg.mb_kegiatan_kode LIKE :cari
					OR keg.mb_kegiatan_nama LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();*/

		$out['results'] = $queryStruk;
		return $out;
	}

	public function actionGetprioritas()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryStruk = $this->_db->createCommand("SELECT mb_prioritas_id AS id, 
					mb_prioritas_nama AS text
				FROM mb_prioritas
				WHERE LOWER(mb_prioritas_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryStruk;
		return $out;
	}

	public function actionGetstruk()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryStruk = $this->_db->createCommand("SELECT mb_rekening_struk_id AS id,
					CONCAT(mb_rekening_struk_kode,' - ', mb_rekening_struk_nama) AS text
				FROM mb_rekening_struk
				WHERE LOWER(mb_rekening_struk_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryStruk;
		return $out;
	}

	public function actionGeturusan()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryUrus = $this->_db->createCommand("SELECT mb_urusan_id AS id, 
					CONCAT(mb_urusan_kode,' - ', mb_urusan_nama) AS text
				FROM mb_urusan
				WHERE LOWER(mb_urusan_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryUrus;
		return $out;
	}

	public function actionGetta()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryTa = $this->_db->createCommand("SELECT mb_tahun_anggaran_nama AS id, mb_tahun_anggaran_nama AS text 
				FROM mb_tahun_anggaran
				WHERE LOWER(mb_tahun_anggaran_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryTa;
		return $out;
	}

	public function actionGetidta()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryTa = $this->_db->createCommand("SELECT mb_tahun_anggaran_id AS id, mb_tahun_anggaran_nama AS text 
				FROM mb_tahun_anggaran
				WHERE LOWER(mb_tahun_anggaran_nama) LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryTa;
		return $out;
	}

	public function actionGetskpd()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		$query = '';
		$paramCari = '';
		
		if (Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id']!='') {
			$query = "SELECT mb_skpd_id AS id, mb_skpd_nama AS text
					FROM mb_skpd
					WHERE mb_skpd_id = :cari
					LIMIT :batas";
			$paramCari = Yii::$app->session[Yii::$app->components['session']['name']]['skpd_id'];
		} else {
			$query = "SELECT mb_skpd_id AS id, mb_skpd_nama AS text
					FROM mb_skpd
					WHERE LOWER(mb_skpd_nama) LIKE :cari
					LIMIT :batas";
			$paramCari = '%'.strtolower($cari).'%';
		}
		
		$querySkpd = $this->_db->createCommand($query)
			->bindValue(':cari', $paramCari)
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $querySkpd;
		return $out;
	}

	public function actionRekeningrinci()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryRek = $this->_db->createCommand("SELECT 
					mb_rekening_rincian_id AS id, mb_rekening_rincian_nama AS text
				FROM mb_rekening_rincian
				WHERE LOWER(mb_rekening_rincian_nama) LIKE :cari
				ORDER BY mb_rekening_rincian_id
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryRek;
		return $out;
	}

	public function actionGetprogram()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryProg = $this->_db->createCommand("SELECT mb_program_id AS id, 
					CONCAT(mb_program_kode,' - ',mb_program_nama) AS text
				FROM mb_program
				WHERE mb_program_kode LIKE :cari OR
					LOWER(mb_program_nama) LIKE :cari
				ORDER BY mb_program_kode
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryProg;
		return $out;
	}

	public function actionGeturusanskpd()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$queryProg = $this->_db->createCommand("SELECT mb_urusan_has_skpd_id AS id,
					CONCAT(urus.mb_urusan_nama,' / ',skpd.mb_skpd_nama) AS text
				FROM mb_urusan_has_skpd AS uskpd
				JOIN mb_urusan AS urus ON uskpd.mb_urusan_id = urus.mb_urusan_id
				JOIN mb_skpd AS skpd ON uskpd.mb_skpd_id = skpd.mb_skpd_id
				WHERE LOWER(urus.mb_urusan_nama) LIKE :cari OR
					LOWER(skpd.mb_skpd_nama) LIKE :cari
				ORDER BY urus.mb_urusan_id
				LIMIT :batas")
			->bindValue(':cari', '%'.strtolower($cari).'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryProg;
		return $out;
	}
}