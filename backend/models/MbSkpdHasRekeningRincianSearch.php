<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbSkpdHasRekeningRincian;

/**
 * MbSkpdHasRekeningRincianSearch represents the model behind the search form about `backend\models\MbSkpdHasRekeningRincian`.
 */
class MbSkpdHasRekeningRincianSearch extends MbSkpdHasRekeningRincian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_has_rekening_rincian_id', 'mb_urusan_has_skpd_id', 'mb_rekening_rincian_id', 'mb_skpd_has_rekening_rincian_vol'], 'integer'],
            [['mb_skpd_has_rekening_rincian_ta', 'mb_skpd_has_rekening_rincian_penjabaran', 'mb_skpd_has_rekening_rincian_satuan', 'mb_skpd_has_rekening_rincian_ket', 'mb_skpd_has_rekening_rincian_created_at'], 'safe'],
            [['mb_skpd_has_rekening_rincian_harga'], 'number'],
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
        $query = MbSkpdHasRekeningRincian::find();

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
            'mb_urusan_has_skpd_id' => $this->mb_urusan_has_skpd_id,
            'mb_rekening_rincian_id' => $this->mb_rekening_rincian_id,
            'mb_skpd_has_rekening_rincian_vol' => $this->mb_skpd_has_rekening_rincian_vol,
            'mb_skpd_has_rekening_rincian_harga' => $this->mb_skpd_has_rekening_rincian_harga,
            'mb_skpd_has_rekening_rincian_created_at' => $this->mb_skpd_has_rekening_rincian_created_at,
        ]);

        $query->andFilterWhere(['like', 'mb_skpd_has_rekening_rincian_penjabaran', $this->mb_skpd_has_rekening_rincian_penjabaran])
            ->andFilterWhere(['like', 'mb_skpd_has_rekening_rincian_satuan', $this->mb_skpd_has_rekening_rincian_satuan])
            ->andFilterWhere(['like', 'mb_skpd_has_rekening_rincian_ket', $this->mb_skpd_has_rekening_rincian_ket]);

        return $dataProvider;
    }
}
