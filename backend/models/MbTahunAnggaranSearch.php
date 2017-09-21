<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbTahunAnggaran;

/**
 * MbTahunAnggaranSearch represents the model behind the search form about `backend\models\MbTahunAnggaran`.
 */
class MbTahunAnggaranSearch extends MbTahunAnggaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_tahun_anggaran_id'], 'integer'],
            [['mb_tahun_anggaran_nama', 'mb_tahun_anggaran_ket'], 'safe'],
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
        $query = MbTahunAnggaran::find();

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
            'mb_tahun_anggaran_id' => $this->mb_tahun_anggaran_id,
            'mb_tahun_anggaran_nama' => $this->mb_tahun_anggaran_nama,
        ]);

        $query->andFilterWhere(['like', 'mb_tahun_anggaran_ket', $this->mb_tahun_anggaran_ket]);

        return $dataProvider;
    }
}
