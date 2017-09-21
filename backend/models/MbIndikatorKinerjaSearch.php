<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbIndikatorKinerja;

/**
 * MbIndikatorKinerjaSearch represents the model behind the search form about `backend\models\MbIndikatorKinerja`.
 */
class MbIndikatorKinerjaSearch extends MbIndikatorKinerja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_indikator_kinerja_id', 'mb_rpjmd_sasaran_id', 'mb_indikator_kinerja_target_1', 'mb_indikator_kinerja_target_2', 'mb_indikator_kinerja_target_3', 'mb_indikator_kinerja_target_4', 'mb_indikator_kinerja_target_5'], 'integer'],
            [['mb_indikator_kinerja_isi', 'mb_indikator_kinerja_satuan', 'mb_indikator_kinerja_awal', 'mb_indikator_kinerja_ket'], 'safe'],
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
        $query = MbIndikatorKinerja::find();

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
            'mb_indikator_kinerja_id' => $this->mb_indikator_kinerja_id,
            'mb_rpjmd_sasaran_id' => $this->mb_rpjmd_sasaran_id,
            'mb_indikator_kinerja_target_1' => $this->mb_indikator_kinerja_target_1,
            'mb_indikator_kinerja_target_2' => $this->mb_indikator_kinerja_target_2,
            'mb_indikator_kinerja_target_3' => $this->mb_indikator_kinerja_target_3,
            'mb_indikator_kinerja_target_4' => $this->mb_indikator_kinerja_target_4,
            'mb_indikator_kinerja_target_5' => $this->mb_indikator_kinerja_target_5,
        ]);

        $query->andFilterWhere(['like', 'mb_indikator_kinerja_isi', $this->mb_indikator_kinerja_isi])
            ->andFilterWhere(['like', 'mb_indikator_kinerja_satuan', $this->mb_indikator_kinerja_satuan])
            ->andFilterWhere(['like', 'mb_indikator_kinerja_awal', $this->mb_indikator_kinerja_awal])
            ->andFilterWhere(['like', 'mb_indikator_kinerja_ket', $this->mb_indikator_kinerja_ket]);

        return $dataProvider;
    }
}
