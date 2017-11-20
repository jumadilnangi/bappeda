<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbRekeningKelompok;

/**
 * MbRekeningKelompokSearch represents the model behind the search form about `backend\models\MbRekeningKelompok`.
 */
class MbRekeningKelompokSearch extends MbRekeningKelompok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_kelompok_id', 'mb_rekening_struk_id', 'mb_rekening_kelompok_kode'], 'integer'],
            [['mb_rekening_kelompok_nama', 'mb_rekening_kelompok_ket'], 'safe'],
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
        $query = MbRekeningKelompok::find();

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
            'mb_rekening_kelompok_id' => $this->mb_rekening_kelompok_id,
            'mb_rekening_struk_id' => $this->mb_rekening_struk_id,
            'mb_rekening_kelompok_kode' => $this->mb_rekening_kelompok_kode,
        ]);

        $query->andFilterWhere(['like', 'mb_rekening_kelompok_nama', $this->mb_rekening_kelompok_nama])
            ->andFilterWhere(['like', 'mb_rekening_kelompok_ket', $this->mb_rekening_kelompok_ket]);

        return $dataProvider;
    }
}
