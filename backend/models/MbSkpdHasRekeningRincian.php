<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_skpd_has_rekening_rincian".
 *
 * @property integer $mb_skpd_has_rekening_rincian_id
 * @property string $mb_skpd_has_rekening_rincian_ta
 * @property integer $mb_urusan_has_skpd_id
 * @property integer $mb_rekening_rincian_id
 * @property string $mb_skpd_has_rekening_rincian_penjabaran
 * @property integer $mb_skpd_has_rekening_rincian_vol
 * @property string $mb_skpd_has_rekening_rincian_satuan
 * @property double $mb_skpd_has_rekening_rincian_harga
 * @property string $mb_skpd_has_rekening_rincian_ket
 * @property string $mb_skpd_has_rekening_rincian_created_at
 *
 * @property MbRekeningRincian $mbRekeningRincian
 * @property MbUrusanHasSkpd $mbUrusanHasSkpd
 */
class MbSkpdHasRekeningRincian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_skpd_has_rekening_rincian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_has_rekening_rincian_ta', 'mb_skpd_has_rekening_rincian_created_at'], 'safe'],
            [['mb_urusan_has_skpd_id', 'mb_rekening_rincian_id'], 'required'],
            [['mb_urusan_has_skpd_id', 'mb_rekening_rincian_id', 'mb_skpd_has_rekening_rincian_vol'], 'integer'],
            [['mb_skpd_has_rekening_rincian_penjabaran'], 'string'],
            [['mb_skpd_has_rekening_rincian_harga'], 'number'],
            [['mb_skpd_has_rekening_rincian_satuan', 'mb_skpd_has_rekening_rincian_ket'], 'string', 'max' => 45],
            [['mb_rekening_rincian_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRekeningRincian::className(), 'targetAttribute' => ['mb_rekening_rincian_id' => 'mb_rekening_rincian_id']],
            [['mb_urusan_has_skpd_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUrusanHasSkpd::className(), 'targetAttribute' => ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_skpd_has_rekening_rincian_id' => 'ID Rincian ',
            'mb_skpd_has_rekening_rincian_ta' => 'Tahun Anggaran',
            'mb_urusan_has_skpd_id' => 'SKPD',
            'mb_rekening_rincian_id' => 'Rincian Rekening ',
            'mb_skpd_has_rekening_rincian_penjabaran' => 'Penjabaran',
            'mb_skpd_has_rekening_rincian_vol' => 'Vol.',
            'mb_skpd_has_rekening_rincian_satuan' => 'Satuan',
            'mb_skpd_has_rekening_rincian_harga' => 'Harga',
            'mb_skpd_has_rekening_rincian_ket' => 'Ket.',
            'mb_skpd_has_rekening_rincian_created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningRincian()
    {
        return $this->hasOne(MbRekeningRincian::className(), ['mb_rekening_rincian_id' => 'mb_rekening_rincian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusanHasSkpd()
    {
        return $this->hasOne(MbUrusanHasSkpd::className(), ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']);
    }
}
