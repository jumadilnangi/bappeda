<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rekening_rincian".
 *
 * @property integer $mb_rekening_rincian_id
 * @property integer $mb_rekening_obyek_id
 * @property string $mb_rekening_rincian_kode
 * @property string $mb_rekening_rincian_nama
 * @property string $mb_rekening_rincian_ket
 *
 * @property MbRekeningObyek $mbRekeningObyek
 * @property MbSkpdHasRekeningRincian[] $mbSkpdHasRekeningRincians
 */
class MbRekeningRincian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rekening_rincian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_obyek_id'], 'required'],
            [['mb_rekening_obyek_id'], 'integer'],
            [['mb_rekening_rincian_kode'], 'string', 'max' => 2],
            [['mb_rekening_rincian_nama'], 'string', 'max' => 145],
            [['mb_rekening_rincian_ket'], 'string', 'max' => 45],
            [['mb_rekening_obyek_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRekeningObyek::className(), 'targetAttribute' => ['mb_rekening_obyek_id' => 'mb_rekening_obyek_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rekening_rincian_id' => 'ID Rincian Rekening',
            'mb_rekening_obyek_id' => 'Obyek ',
            'mb_rekening_rincian_kode' => 'Kode Rincian ',
            'mb_rekening_rincian_nama' => 'Nama Rincian ',
            'mb_rekening_rincian_ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningObyek()
    {
        return $this->hasOne(MbRekeningObyek::className(), ['mb_rekening_obyek_id' => 'mb_rekening_obyek_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpdHasRekeningRincians()
    {
        return $this->hasMany(MbSkpdHasRekeningRincian::className(), ['mb_rekening_rincian_id' => 'mb_rekening_rincian_id']);
    }
}
