<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbSumberDana;

/**
 * MbSumberDanaSearch represents the model behind the search form about `backend\models\MbSumberDana`.
 */
class MbSumberDanaSearch extends MbSumberDana
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_sumber_dana_id'], 'integer'],
            [['mb_sumber_dana_nama'], 'safe'],
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
        $query = MbSumberDana::find();

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
            'mb_sumber_dana_id' => $this->mb_sumber_dana_id,
        ]);

        $query->andFilterWhere(['like', 'mb_sumber_dana_nama', $this->mb_sumber_dana_nama]);

        return $dataProvider;
    }
}
