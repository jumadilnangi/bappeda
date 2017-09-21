<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbSkpd;

/**
 * MbSkpdSearch represents the model behind the search form about `backend\models\MbSkpd`.
 */
class MbSkpdSearch extends MbSkpd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_id'], 'integer'],
            [['mb_skpd_kode', 'mb_skpd_nama', 'mb_skpd_singkatan', 'mb_skpd_ket'], 'safe'],
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
        $query = MbSkpd::find();

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
            'mb_skpd_id' => $this->mb_skpd_id,
        ]);

        $query->andFilterWhere(['like', 'mb_skpd_kode', $this->mb_skpd_kode])
            ->andFilterWhere(['like', 'mb_skpd_nama', $this->mb_skpd_nama])
            ->andFilterWhere(['like', 'mb_skpd_singkatan', $this->mb_skpd_singkatan])
            ->andFilterWhere(['like', 'mb_skpd_ket', $this->mb_skpd_ket]);

        return $dataProvider;
    }
}
