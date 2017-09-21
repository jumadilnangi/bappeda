<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbUrusanHasSkpd;

/**
 * MbUrusanHasSkpdSearch represents the model behind the search form about `backend\models\MbUrusanHasSkpd`.
 */
class MbUrusanHasSkpdSearch extends MbUrusanHasSkpd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_has_skpd_id'], 'integer'],
            [['mb_urusan_has_skpd_mulai',  'mb_skpd_id', 'mb_urusan_id', 'mb_urusan_has_skpd_akhir', 'mb_urusan_has_skpd_sk', 'mb_urusan_has_skpd_ket'], 'safe'],
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
        $query = MbUrusanHasSkpd::find();

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
        $query ->joinWith('mbUrusan');
        $query ->joinWith('mbSkpd');
        // grid filtering conditions
        $query->andFilterWhere([
            'mb_urusan_has_skpd_id' => $this->mb_urusan_has_skpd_id,
           // 'mb_skpd_id' => $this->mb_skpd_id,
            'mb_urusan_has_skpd_mulai' => $this->mb_urusan_has_skpd_mulai,
            'mb_urusan_has_skpd_akhir' => $this->mb_urusan_has_skpd_akhir,
        ]);

        $query->andFilterWhere(['like', 'mb_urusan_has_skpd_sk', $this->mb_urusan_has_skpd_sk])
            ->andFilterWhere(['like', 'mb_urusan_has_skpd_ket', $this->mb_urusan_has_skpd_ket])
                ->andFilterWhere(['like', 'mb_urusan.mb_urusan_nama', $this->mb_urusan_id])
                ->andFilterWhere(['like', 'mb_skpd.mb_skpd_nama', $this->mb_skpd_id]);

        return $dataProvider;
    }
}
