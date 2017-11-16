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

		$query->joinWith('mbRenja');
        $query->joinWith('mbRenja.mbKegiatan');
        $query->joinWith('mbRenja.mbKegiatan.mbProgram');
        $query->joinWith('mbRenja.mbKegiatan.mbProgram.mbUrusanHasSkpd');
        $query->joinWith('mbRenja.mbKegiatan.mbProgram.mbUrusanHasSkpd.mbSkpd');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'mb_uraian_pekerjaan_id' => $this->mb_uraian_pekerjaan_id,
            'mb_uraian_pekerjaan.mb_renja_id' => $this->mb_renja_id,
            'mb_sumber_dana_id' => $this->mb_sumber_dana_id,
            'mb_uraian_pekerjaan_vol' => $this->mb_uraian_pekerjaan_vol,
            'mb_uraian_pekerjaan_harga_satuan' => $this->mb_uraian_pekerjaan_harga_satuan,
            'mb_uraian_pekerjaan_pagu_tahun_maju' => $this->mb_uraian_pekerjaan_pagu_tahun_maju,
        ]);

        $query->andFilterWhere(['like', 'mb_uraian_pekerjaan_nama', $this->mb_uraian_pekerjaan_nama])
            ->andFilterWhere(['like', 'mb_uraian_pekerjaan_satuan', $this->mb_uraian_pekerjaan_satuan]);

		return $dataProvider;
	}
}