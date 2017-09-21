<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbRekeningObyek;

/**
 * MbRekeningObyekSearch represents the model behind the search form about `backend\models\MbRekeningObyek`.
 */
class MbRekeningObyekSearch extends MbRekeningObyek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_obyek_id', 'mb_rekening_jenis_id'], 'integer'],
            [['mb_rekening_obyek_kode', 'mb_rekening_obyek_nama', 'mb_rekening_obyek_ket'], 'safe'],
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
        $query = MbRekeningObyek::find();

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
            'mb_rekening_obyek_id' => $this->mb_rekening_obyek_id,
            'mb_rekening_jenis_id' => $this->mb_rekening_jenis_id,
        ]);

        $query->andFilterWhere(['like', 'mb_rekening_obyek_kode', $this->mb_rekening_obyek_kode])
            ->andFilterWhere(['like', 'mb_rekening_obyek_nama', $this->mb_rekening_obyek_nama])
            ->andFilterWhere(['like', 'mb_rekening_obyek_ket', $this->mb_rekening_obyek_ket]);

        return $dataProvider;
    }
}
