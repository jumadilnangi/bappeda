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
					'delete' => ['POST'],
				],
			],
		];
	}

	public function init()
	{
		$this->_request = Yii::$app->request;
		$this->_db = Yii::$app->db;
	}

	public function actionGetskpd()
	{
		\Yii::$app->response->format = Response::FORMAT_JSON;
		$cari = $this->_request->post('cari');
		$limit = $this->_request->post('page',10);
		
		$querySkpd = $this->_db->createCommand("SELECT mb_skpd_id AS id, mb_skpd_nama AS text
				FROM mb_skpd
				WHERE mb_skpd_nama LIKE :cari
				LIMIT :batas")
			->bindValue(':cari', '%'.$cari.'%')
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
				WHERE mb_rekening_rincian_nama LIKE :cari
				ORDER BY mb_rekening_rincian_id
				LIMIT :batas")
			->bindValue(':cari', '%'.$cari.'%')
			->bindValue(':batas', (int)$limit)
			->queryAll();

		$out['results'] = $queryRek;
		return $out;
	}
}