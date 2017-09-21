<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_uraian_pekerjaan".
 *
 * @property integer $mb_uraian_pekerjaan_id
 * @property integer $mb_renja_id
 * @property integer $mb_sumber_dana_id
 * @property string $mb_uraian_pekerjaan_nama
 * @property string $mb_uraian_pekerjaan_rw
 * @property string $mb_uraian_pekerjaan_rt
 * @property integer $mb_uraian_pekerjaan_vol
 * @property string $mb_uraian_pekerjaan_satuan
 * @property double $mb_uraian_pekerjaan_harga_satuan
 * @property double $mb_uraian_pekerjaan_pagu_tahun_maju
 *
 * @property MbLokasiPekerjaan[] $mbLokasiPekerjaans
 * @property MbRenja $mbRenja
 * @property MbSumberDana $mbSumberDana
 * @property MbUraianPekerjaanHasStatus[] $mbUraianPekerjaanHasStatuses
 */
class MbUraianPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_uraian_pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_renja_id', 'mb_sumber_dana_id'], 'required'],
            [['mb_renja_id', 'mb_sumber_dana_id', 'mb_uraian_pekerjaan_vol'], 'integer'],
            [['mb_uraian_pekerjaan_nama'], 'string'],
            [['mb_uraian_pekerjaan_harga_satuan', 'mb_uraian_pekerjaan_pagu_tahun_maju'], 'number'],
            [[ 'mb_uraian_pekerjaan_satuan'], 'string', 'max' => 45],
            [['mb_renja_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRenja::className(), 'targetAttribute' => ['mb_renja_id' => 'mb_renja_id']],
            [['mb_sumber_dana_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbSumberDana::className(), 'targetAttribute' => ['mb_sumber_dana_id' => 'mb_sumber_dana_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_uraian_pekerjaan_id' => 'Uraian RENJA',
            'mb_renja_id' => 'RENJA',
            'mb_sumber_dana_id' => 'Sumber Dana',
            'mb_uraian_pekerjaan_nama' => 'Uraian Pekerjaan ',
           
            'mb_uraian_pekerjaan_vol' => 'Volume',
            'mb_uraian_pekerjaan_satuan' => 'Satuan ',
            'mb_uraian_pekerjaan_harga_satuan' => 'Harga Satuan',
            'mb_uraian_pekerjaan_pagu_tahun_maju' => 'Pagu Tahun Maju',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbLokasiPekerjaans()
    {
        return $this->hasMany(MbLokasiPekerjaan::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRenja()
    {
        return $this->hasOne(MbRenja::className(), ['mb_renja_id' => 'mb_renja_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSumberDana()
    {
        return $this->hasOne(MbSumberDana::className(), ['mb_sumber_dana_id' => 'mb_sumber_dana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaanHasStatuses()
    {
        return $this->hasMany(MbUraianPekerjaanHasStatus::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
    }
}
