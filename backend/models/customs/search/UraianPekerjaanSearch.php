<?php

namespace backend\models\customs\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

//use backend\models\MbUraianPekerjaanSearch;
use backend\models\customs\UraianPekerjaan;

/**
* extend backend\models\customs\UraianPekerjaan;
*/
class UraianPekerjaanSearch extends UraianPekerjaan
{
	public function rules()
	{
		return [
			[['mb_uraian_pekerjaan_id', 'mb_renja_id', 'mb_sumber_dana_id', 'mb_uraian_pekerjaan_vol'], 'integer'],
			[['mb_uraian_pekerjaan_nama', 'mb_uraian_pekerjaan_satuan'], 'safe'],
			[['mb_uraian_pekerjaan_harga_satuan', 'mb_uraian_pekerjaan_pagu_tahun_maju'], 'number'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = UraianPekerjaan::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		return $dataProvider;
	}
}