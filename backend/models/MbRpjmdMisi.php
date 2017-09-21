<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rpjmd_misi".
 *
 * @property integer $mb_rpjmd_misi_id
 * @property integer $mb_rpjmd_visi_id
 * @property string $mb_rpjmd_misi_isi
 * @property string $mb_rpjmd_misi_ket
 *
 * @property MbRpjmdVisi $mbRpjmdVisi
 * @property MbTujuan[] $mbTujuans
 */
class MbRpjmdMisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rpjmd_misi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rpjmd_visi_id'], 'required'],
            [['mb_rpjmd_visi_id'], 'integer'],
            [['mb_rpjmd_misi_isi'], 'string'],
            [['mb_rpjmd_misi_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_visi_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRpjmdVisi::className(), 'targetAttribute' => ['mb_rpjmd_visi_id' => 'mb_rpjmd_visi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rpjmd_misi_id' => 'Misi ',
            'mb_rpjmd_visi_id' => 'Visi ',
            'mb_rpjmd_misi_isi' => 'Visi',
            'mb_rpjmd_misi_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRpjmdVisi()
    {
        return $this->hasOne(MbRpjmdVisi::className(), ['mb_rpjmd_visi_id' => 'mb_rpjmd_visi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbTujuans()
    {
        return $this->hasMany(MbTujuan::className(), ['mb_rpjmd_misi_id' => 'mb_rpjmd_misi_id']);
    }
}
