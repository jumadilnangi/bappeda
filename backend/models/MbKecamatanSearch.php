<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbKecamatan;

/**
 * MbKecamatanSearch represents the model behind the search form about `backend\models\MbKecamatan`.
 */
class MbKecamatanSearch extends MbKecamatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kecamatan_id'], 'integer'],
            [['mb_kecamatan_kode', 'mb_kabupaten_kota_id', 'mb_kecamatan_nama'], 'safe'],
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
        $query = MbKecamatan::find();

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
        $query ->joinWith('mbKabupatenKota');
        // grid filtering conditions
        $query->andFilterWhere([
            'mb_kecamatan_id' => $this->mb_kecamatan_id,
         
        ]);

        $query->andFilterWhere(['like', 'mb_kecamatan_kode', $this->mb_kecamatan_kode])
            ->andFilterWhere(['like', 'mb_kecamatan_nama', $this->mb_kecamatan_nama])
            ->andFilterWhere(['like', 'mb_kabupaten_kota.mb_kabupaten_nama', $this->mb_kabupaten_kota_id]);

        return $dataProvider;
    }
}
