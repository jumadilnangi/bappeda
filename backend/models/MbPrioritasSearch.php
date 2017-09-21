<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbPrioritas;

/**
 * MbPrioritasSearch represents the model behind the search form about `backend\models\MbPrioritas`.
 */
class MbPrioritasSearch extends MbPrioritas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_prioritas_id', 'mb_prioritas_no_urut'], 'integer'],
            [['mb_prioritas_nama', 'mb_prioritas_ket'], 'safe'],
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
        $query = MbPrioritas::find();

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
            'mb_prioritas_id' => $this->mb_prioritas_id,
            'mb_prioritas_no_urut' => $this->mb_prioritas_no_urut,
        ]);

        $query->andFilterWhere(['like', 'mb_prioritas_nama', $this->mb_prioritas_nama])
            ->andFilterWhere(['like', 'mb_prioritas_ket', $this->mb_prioritas_ket]);

        return $dataProvider;
    }
}
