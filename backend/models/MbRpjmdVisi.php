<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rpjmd_visi".
 *
 * @property integer $mb_rpjmd_visi_id
 * @property string $mb_rpjmd_visi_isi
 * @property string $mb_rpjmd_visi_awal
 * @property string $mb_rpjmd_visi_akhir
 * @property string $mb_rpjmd_visi_ket
 *
 * @property MbRpjmdMisi[] $mbRpjmdMisis
 */
class MbRpjmdVisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rpjmd_visi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rpjmd_visi_isi'], 'string'],
            [['mb_rpjmd_visi_awal', 'mb_rpjmd_visi_akhir'], 'safe'],
            [['mb_rpjmd_visi_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rpjmd_visi_id' => 'Mb Rpjmd Visi ID',
            'mb_rpjmd_visi_isi' => 'Mb Rpjmd Visi Isi',
            'mb_rpjmd_visi_awal' => 'Mb Rpjmd Visi Awal',
            'mb_rpjmd_visi_akhir' => 'Mb Rpjmd Visi Akhir',
            'mb_rpjmd_visi_ket' => 'Mb Rpjmd Visi Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRpjmdMisis()
    {
        return $this->hasMany(MbRpjmdMisi::className(), ['mb_rpjmd_visi_id' => 'mb_rpjmd_visi_id']);
    }
}
