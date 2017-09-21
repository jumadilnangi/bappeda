<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MbKegiatan;

/**
 * MbKegiatanSearch represents the model behind the search form about `backend\models\MbKegiatan`.
 */
class MbKegiatanSearch extends MbKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_kegiatan_id', 'mb_program_id'], 'integer'],
            [['mb_kegiatan_kode', 'mb_kegiatan_nama', 'mb_kegiatan_ket'], 'safe'],
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
        $query = MbKegiatan::find();

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
            'mb_kegiatan_id' => $this->mb_kegiatan_id,
            'mb_program_id' => $this->mb_program_id,
        ]);

        $query->andFilterWhere(['like', 'mb_kegiatan_kode', $this->mb_kegiatan_kode])
            ->andFilterWhere(['like', 'mb_kegiatan_nama', $this->mb_kegiatan_nama])
            ->andFilterWhere(['like', 'mb_kegiatan_ket', $this->mb_kegiatan_ket]);

        return $dataProvider;
    }
}
