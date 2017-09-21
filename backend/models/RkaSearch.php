<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rka;

/**
 * RkaSearch represents the model behind the search form about `backend\models\Rka`.
 */
class RkaSearch extends Rka
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_has_rekening_rincian_id', 'mb_skpd_has_rekening_rincian_ta','kode_jenis_urusan', 'kode_kelompok', 'kode_jenis', 'volume'], 'integer'],
            [['nama_jenis_urusan', 'kode_urusan', 'nama_urusan', 'kode_skpd', 'nama_skpd', 'kode_struk', 'nama_struk', 'nama_kelompok', 'nama_jenis', 'kode_obyek', 'nama_obyek', 'kode_rincian', 'nama_rincian', 'penjabaran', 'satuan'], 'safe'],
            [['harga'], 'number'],
        ];
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
        $query = Rka::find();

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
            'mb_skpd_has_rekening_rincian_id' => $this->mb_skpd_has_rekening_rincian_id,
            'mb_skpd_has_rekening_rincian_ta' => $this->mb_skpd_has_rekening_rincian_ta,
            'kode_jenis_urusan' => $this->kode_jenis_urusan,
            'kode_kelompok' => $this->kode_kelompok,
            'kode_jenis' => $this->kode_jenis,
            'volume' => $this->volume,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nama_jenis_urusan', $this->nama_jenis_urusan])
            ->andFilterWhere(['like', 'kode_urusan', $this->kode_urusan])
            ->andFilterWhere(['like', 'nama_urusan', $this->nama_urusan])
            ->andFilterWhere(['like', 'kode_skpd', $this->kode_skpd])
            ->andFilterWhere(['like', 'nama_skpd', $this->nama_skpd])
            ->andFilterWhere(['like', 'kode_struk', $this->kode_struk])
            ->andFilterWhere(['like', 'nama_struk', $this->nama_struk])
            ->andFilterWhere(['like', 'nama_kelompok', $this->nama_kelompok])
            ->andFilterWhere(['like', 'nama_jenis', $this->nama_jenis])
            ->andFilterWhere(['like', 'kode_obyek', $this->kode_obyek])
            ->andFilterWhere(['like', 'nama_obyek', $this->nama_obyek])
            ->andFilterWhere(['like', 'kode_rincian', $this->kode_rincian])
            ->andFilterWhere(['like', 'nama_rincian', $this->nama_rincian])
            ->andFilterWhere(['like', 'penjabaran', $this->penjabaran])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
