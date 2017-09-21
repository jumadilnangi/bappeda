<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbUrusanJenis;

/**
 * MbUrusanJenisSearch represents the model behind the search form about `backend\models\MbUrusanJenis`.
 */
class MbUrusanJenisSearch extends MbUrusanJenis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_jenis_id', 'mb_urusan_jenis_kode'], 'integer'],
            [['mb_urusan_jenis_nama'], 'safe'],
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
        $query = MbUrusanJenis::find();

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
            'mb_urusan_jenis_id' => $this->mb_urusan_jenis_id,
            'mb_urusan_jenis_kode' => $this->mb_urusan_jenis_kode,
        ]);

        $query->andFilterWhere(['like', 'mb_urusan_jenis_nama', $this->mb_urusan_jenis_nama]);

        return $dataProvider;
    }
}
