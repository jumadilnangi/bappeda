<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbRenja;

/**
 * MbRenjaSearch represents the model behind the search form about `backend\models\MbRenja`.
 */
class MbRenjaSearch extends MbRenja
{
    public $mb_tahun_anggaran_nama;
    public $mb_skpd_nama;
    public $mb_skpd_kode;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_renja_id', 'mb_tahun_anggaran_id', 'mb_kegiatan_id', 'mb_sasaran_id'], 'integer'],
            [['mb_skpd_kode', 'mb_skpd_nama', 'mb_tahun_anggaran_nama', 'mb_renja_indikator_kegiatan', 'mb_renja_indikator_keg', 'mb_renja_sasaran_keg', 'mb_renja_hasil_prog_tolak_ukur', 'mb_renja_hasil_prog_target_kerja', 'mb_renja_keluaran_tolak_ukur', 'mb_renja_keluaran_tolak_target_kerja', 'mb_renja_hasil_kerja_tolak_ukur', 'mb_renja_hasil_kerja_tolak_target_kerja', 'mb_renja_target_capaian', 'mb_renja_target_capaian_thn_maju', 'mb_renja_ket'], 'safe'],
            [['mb_renja_pagu_indikatif'], 'number'],
        ];
    }

    public function formName()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MbRenja::find();

        $query->joinWith('mbTahunAnggaran');
        $query->joinWith('mbKegiatan');
        $query->joinWith('mbKegiatan.mbProgram');
        $query->joinWith('mbKegiatan.mbProgram.mbUrusanHasSkpd');
        $query->joinWith('mbKegiatan.mbProgram.mbUrusanHasSkpd.mbSkpd');

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
            'mb_renja_id' => $this->mb_renja_id,
            //'mb_tahun_anggaran_id' => $this->mb_tahun_anggaran_id,
            'mb_kegiatan_id' => $this->mb_kegiatan_id,
            'mb_sasaran_id' => $this->mb_sasaran_id,
            'mb_renja_pagu_indikatif' => $this->mb_renja_pagu_indikatif,
            'mb_tahun_anggaran.mb_tahun_anggaran_nama' => $this->mb_tahun_anggaran_id,
        ]);

        $query->andFilterWhere(['like', 'mb_renja_indikator_kegiatan', $this->mb_renja_indikator_kegiatan])
            ->andFilterWhere(['like', 'mb_renja_indikator_keg', $this->mb_renja_indikator_keg])
            ->andFilterWhere(['like', 'mb_renja_sasaran_keg', $this->mb_renja_sasaran_keg])
            ->andFilterWhere(['like', 'mb_renja_hasil_prog_tolak_ukur', $this->mb_renja_hasil_prog_tolak_ukur])
            ->andFilterWhere(['like', 'mb_renja_hasil_prog_target_kerja', $this->mb_renja_hasil_prog_target_kerja])
            ->andFilterWhere(['like', 'mb_renja_keluaran_tolak_ukur', $this->mb_renja_keluaran_tolak_ukur])
            ->andFilterWhere(['like', 'mb_renja_keluaran_tolak_target_kerja', $this->mb_renja_keluaran_tolak_target_kerja])
            ->andFilterWhere(['like', 'mb_renja_hasil_kerja_tolak_ukur', $this->mb_renja_hasil_kerja_tolak_ukur])
            ->andFilterWhere(['like', 'mb_renja_hasil_kerja_tolak_target_kerja', $this->mb_renja_hasil_kerja_tolak_target_kerja])
            ->andFilterWhere(['like', 'mb_renja_target_capaian', $this->mb_renja_target_capaian])
            ->andFilterWhere(['like', 'mb_renja_target_capaian_thn_maju', $this->mb_renja_target_capaian_thn_maju])
            ->andFilterWhere(['like', 'mb_renja_ket', $this->mb_renja_ket])
            //->andFilterWhere(['like', 'LOWER(mb_skpd.mb_skpd_ksode)', strtolower($this->mb_skpd_nama)])
            //->andFilterWhere(['like', 'LOWER(mb_skpd.mb_skpd_nama)', strtolower($this->mb_skpd_nama)]);
            ->andFilterWhere(['like', 'LOWER(mb_skpd.mb_skpd_id)', strtolower($this->mb_skpd_nama)]);

        //echo "<pre>";
        //print_r($query->createCommand()->getRawSql());
        //print_r($query->createCommand()->sql);
        //echo "</pre>";
        //exit();

        return $dataProvider;
    }
}
