<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbKabupatenKota;

/**
 * MbKabupatenKotaSearch represents the model behind the search form about `backend\models\MbKabupatenKota`.
 */
class MbKabupatenKotaSearch extends MbKabupatenKota
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kabupaten_kota_id', 'mb_provinsi_id'], 'integer'],
            [['mb_kabupaten_kota_kode', 'mb_kabupaten_nama'], 'safe'],
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
        $query = MbKabupatenKota::find();

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
            'mb_kabupaten_kota_id' => $this->mb_kabupaten_kota_id,
            'mb_provinsi_id' => $this->mb_provinsi_id,
        ]);

        $query->andFilterWhere(['like', 'mb_kabupaten_kota_kode', $this->mb_kabupaten_kota_kode])
            ->andFilterWhere(['like', 'mb_kabupaten_nama', $this->mb_kabupaten_nama]);

        return $dataProvider;
    }
}
