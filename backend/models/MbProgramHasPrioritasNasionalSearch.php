<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbProgramHasPrioritasNasional;

/**
 * MbProgramHasPrioritasNasionalSearch represents the model behind the search form about `backend\models\MbProgramHasPrioritasNasional`.
 */
class MbProgramHasPrioritasNasionalSearch extends MbProgramHasPrioritasNasional
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_program_has_prioritas_nasional_id', 'mb_program_id', 'mb_prioritas_nasional_id'], 'integer'],
            [['mb_program_has_prioritas_nasional_awal', 'mb_program_has_prioritas_nasional_akhir', 'mb_program_has_prioritas_nasional_ket'], 'safe'],
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
        $query = MbProgramHasPrioritasNasional::find();

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
            'mb_program_has_prioritas_nasional_id' => $this->mb_program_has_prioritas_nasional_id,
            'mb_program_id' => $this->mb_program_id,
            'mb_prioritas_nasional_id' => $this->mb_prioritas_nasional_id,
            'mb_program_has_prioritas_nasional_awal' => $this->mb_program_has_prioritas_nasional_awal,
            'mb_program_has_prioritas_nasional_akhir' => $this->mb_program_has_prioritas_nasional_akhir,
        ]);

        $query->andFilterWhere(['like', 'mb_program_has_prioritas_nasional_ket', $this->mb_program_has_prioritas_nasional_ket]);

        return $dataProvider;
    }
}
