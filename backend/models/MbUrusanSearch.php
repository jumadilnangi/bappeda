<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbUrusan;

/**
 * MbUrusanSearch represents the model behind the search form about `backend\models\MbUrusan`.
 */
class MbUrusanSearch extends MbUrusan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_id'], 'integer'],
            [['mb_urusan_kode', 'mb_urusan_jenis_id', 'mb_urusan_nama', 'mb_urusan_ket'], 'safe'],
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
        $query = MbUrusan::find();

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
        //$query ->joinWith('mbUrusanJenis');
        // grid filtering conditions
        $query->andFilterWhere([
            'mb_urusan_id' => $this->mb_urusan_id,
            'mb_urusan_jenis_id' => $this->mb_urusan_jenis_id,
            
        ]);

        $query->andFilterWhere(['like', 'mb_urusan_kode', $this->mb_urusan_kode])
            ->andFilterWhere(['like', 'mb_urusan_nama', $this->mb_urusan_nama])
            ->andFilterWhere(['like', 'mb_urusan_ket', $this->mb_urusan_ket]);
            //->andFilterWhere(['like', 'mb_urusan_jenis.mb_urusan_jenis_nama', $this->mb_urusan_jenis_id]);

        return $dataProvider;
    }
}
