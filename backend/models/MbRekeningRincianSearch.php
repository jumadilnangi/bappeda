<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbRekeningRincian;

/**
 * MbRekeningRincianSearch represents the model behind the search form about `backend\models\MbRekeningRincian`.
 */
class MbRekeningRincianSearch extends MbRekeningRincian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_rincian_id', 'mb_rekening_obyek_id'], 'integer'],
            [['mb_rekening_rincian_kode', 'mb_rekening_rincian_nama', 'mb_rekening_rincian_ket'], 'safe'],
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
        $query = MbRekeningRincian::find();

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
            'mb_rekening_rincian_id' => $this->mb_rekening_rincian_id,
            'mb_rekening_obyek_id' => $this->mb_rekening_obyek_id,
        ]);

        $query->andFilterWhere(['like', 'mb_rekening_rincian_kode', $this->mb_rekening_rincian_kode])
            ->andFilterWhere(['like', 'mb_rekening_rincian_nama', $this->mb_rekening_rincian_nama])
            ->andFilterWhere(['like', 'mb_rekening_rincian_ket', $this->mb_rekening_rincian_ket]);

        return $dataProvider;
    }
}
