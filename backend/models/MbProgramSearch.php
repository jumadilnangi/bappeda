<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbProgram;

/**
 * MbProgramSearch represents the model behind the search form about `backend\models\MbProgram`.
 */
class MbProgramSearch extends MbProgram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_program_id', 'mb_urusan_has_skpd_id'], 'integer'],
            [['mb_program_kode', 'mb_program_nama', 'mb_program_ket'], 'safe'],
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
        $query = MbProgram::find();

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
            'mb_program_id' => $this->mb_program_id,
            'mb_urusan_has_skpd_id' => $this->mb_urusan_has_skpd_id,
        ]);

        $query->andFilterWhere(['like', 'mb_program_kode', $this->mb_program_kode])
            ->andFilterWhere(['like', 'mb_program_nama', $this->mb_program_nama])
            ->andFilterWhere(['like', 'mb_program_ket', $this->mb_program_ket]);

        return $dataProvider;
    }
}
