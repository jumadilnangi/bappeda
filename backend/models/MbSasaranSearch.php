<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbSasaran;

/**
 * MbSasaranSearch represents the model behind the search form about `backend\models\MbSasaran`.
 */
class MbSasaranSearch extends MbSasaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_sasaran_id', 'mb_prioritas_id'], 'integer'],
            [['mb_sasaran_nama', 'mb_sasaran_ket'], 'safe'],
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
        $query = MbSasaran::find();

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
            'mb_sasaran_id' => $this->mb_sasaran_id,
            'mb_prioritas_id' => $this->mb_prioritas_id,
        ]);

        $query->andFilterWhere(['like', 'mb_sasaran_nama', $this->mb_sasaran_nama])
            ->andFilterWhere(['like', 'mb_sasaran_ket', $this->mb_sasaran_ket]);

        return $dataProvider;
    }
}
