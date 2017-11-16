<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbPrioritasNasional;

/**
 * MbPrioritasNasionalSearch represents the model behind the search form about `backend\models\MbPrioritasNasional`.
 */
class MbPrioritasNasionalSearch extends MbPrioritasNasional
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_prioritas_nasional_id'], 'integer'],
            [['mb_prioritas_nasional_kode', 'mb_prioritas_nasional_nama', 'mb_prioritas_nasional_ket'], 'safe'],
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
        $query = MbPrioritasNasional::find();

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
            'mb_prioritas_nasional_id' => $this->mb_prioritas_nasional_id,
        ]);

        $query->andFilterWhere(['like', 'mb_prioritas_nasional_kode', $this->mb_prioritas_nasional_kode])
            ->andFilterWhere(['like', 'mb_prioritas_nasional_nama', $this->mb_prioritas_nasional_nama])
            ->andFilterWhere(['like', 'mb_prioritas_nasional_ket', $this->mb_prioritas_nasional_ket]);

        return $dataProvider;
    }
}
