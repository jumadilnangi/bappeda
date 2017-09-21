<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbTujuan;

/**
 * MbTujuanSearch represents the model behind the search form about `backend\models\MbTujuan`.
 */
class MbTujuanSearch extends MbTujuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_tujuan_id', 'mb_rpjmd_misi_id'], 'integer'],
            [['mb_tujuan_isi', 'mb_tujuan_ket'], 'safe'],
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
        $query = MbTujuan::find();

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
            'mb_tujuan_id' => $this->mb_tujuan_id,
            'mb_rpjmd_misi_id' => $this->mb_rpjmd_misi_id,
        ]);

        $query->andFilterWhere(['like', 'mb_tujuan_isi', $this->mb_tujuan_isi])
            ->andFilterWhere(['like', 'mb_tujuan_ket', $this->mb_tujuan_ket]);

        return $dataProvider;
    }
}
