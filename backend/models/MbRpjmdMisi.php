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
            'mb_rpjmd_misi_id' => 'Mb Rpjmd Misi ID',
            'mb_rpjmd_visi_id' => 'Mb Rpjmd Visi ID',
            'mb_rpjmd_misi_isi' => 'Mb Rpjmd Misi Isi',
            'mb_rpjmd_misi_ket' => 'Mb Rpjmd Misi Ket',
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
