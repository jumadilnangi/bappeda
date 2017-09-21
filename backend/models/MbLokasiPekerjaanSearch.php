<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbLokasiPekerjaan;

/**
 * MbLokasiPekerjaanSearch represents the model behind the search form about `backend\models\MbLokasiPekerjaan`.
 */
class MbLokasiPekerjaanSearch extends MbLokasiPekerjaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_lokasi_pekerjaan_id', 'mb_uraian_pekerjaan_id', 'mb_kelurahan_desa_id'], 'integer'],
            [['mb_lokasi_pekerjaan_latitudes', 'mb_lokasi_pekerjaan_longitudes'], 'number'],
            [['mb_lokasi_pekerjaan_rw', 'mb_lokasi_pekerjaan_rt', 'mb_lokasi_pekerjaan_ket'], 'safe'],
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
        $query = MbLokasiPekerjaan::find();

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
            'mb_lokasi_pekerjaan_id' => $this->mb_lokasi_pekerjaan_id,
            'mb_uraian_pekerjaan_id' => $this->mb_uraian_pekerjaan_id,
            'mb_kelurahan_desa_id' => $this->mb_kelurahan_desa_id,
            'mb_lokasi_pekerjaan_latitudes' => $this->mb_lokasi_pekerjaan_latitudes,
            'mb_lokasi_pekerjaan_longitudes' => $this->mb_lokasi_pekerjaan_longitudes,
        ]);

        $query->andFilterWhere(['like', 'mb_lokasi_pekerjaan_rw', $this->mb_lokasi_pekerjaan_rw])
            ->andFilterWhere(['like', 'mb_lokasi_pekerjaan_rt', $this->mb_lokasi_pekerjaan_rt])
            ->andFilterWhere(['like', 'mb_lokasi_pekerjaan_ket', $this->mb_lokasi_pekerjaan_ket]);

        return $dataProvider;
    }
}
