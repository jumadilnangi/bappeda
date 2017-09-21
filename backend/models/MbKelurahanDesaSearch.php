<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbKelurahanDesa;

/**
 * MbKelurahanDesaSearch represents the model behind the search form about `backend\models\MbKelurahanDesa`.
 */
class MbKelurahanDesaSearch extends MbKelurahanDesa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kelurahan_desa_id'], 'integer'],
            [['mb_kelurahan_desa_kode', 'mb_kecamatan_id', 'mb_kelurahan_desa_nama'], 'safe'],
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
        $query = MbKelurahanDesa::find();

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
        
        $query->joinWith('mbKecamatan');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'mb_kelurahan_desa_id' => $this->mb_kelurahan_desa_id,
        ]);

        $query->andFilterWhere(['like', 'mb_kelurahan_desa_kode', $this->mb_kelurahan_desa_kode])
            ->andFilterWhere(['like', 'mb_kelurahan_desa_nama', $this->mb_kelurahan_desa_nama])
            ->andFilterWhere(['like', 'mb_kecamatan.mb_kecamatan_nama', $this->mb_kecamatan_id]);

        return $dataProvider;
    }
}
