<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rpjmd_sasaran".
 *
 * @property integer $mb_rpjmd_sasaran_id
 * @property integer $mb_rpjmd_tujuan_id
 * @property string $mb_sasaran_isi
 * @property string $mb_sasaran_ket
 *
 * @property MbIndikatorKinerja[] $mbIndikatorKinerjas
 * @property MbRpjmdTujuan $mbRpjmdTujuan
 */
class MbRpjmdSasaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rpjmd_sasaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rpjmd_tujuan_id'], 'required'],
            [['mb_rpjmd_tujuan_id'], 'integer'],
            [['mb_sasaran_isi'], 'string'],
            [['mb_sasaran_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_tujuan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRpjmdTujuan::className(), 'targetAttribute' => ['mb_rpjmd_tujuan_id' => 'mb_rpjmd_tujuan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rpjmd_sasaran_id' => 'ID Sasaran',
            'mb_rpjmd_tujuan_id' => 'Tujuan',
            'mb_sasaran_isi' => 'Sasaran',
            'mb_sasaran_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbIndikatorKinerjas()
    {
        return $this->hasMany(MbIndikatorKinerja::className(), ['mb_rpjmd_sasaran_id' => 'mb_rpjmd_sasaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRpjmdTujuan()
    {
        return $this->hasOne(MbRpjmdTujuan::className(), ['mb_rpjmd_tujuan_id' => 'mb_rpjmd_tujuan_id']);
    }
}
