<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_urusan".
 *
 * @property integer $mb_urusan_id
 * @property integer $mb_urusan_jenis_id
 * @property string $mb_urusan_kode
 * @property string $mb_urusan_nama
 * @property string $mb_urusan_ket
 *
 * @property MbUrusanJenis $mbUrusanJenis
 * @property MbUrusanHasSkpd[] $mbUrusanHasSkpds
 */
class MbUrusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_urusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_jenis_id'], 'required'],
            [['mb_urusan_jenis_id'], 'integer'],
            [['mb_urusan_kode', 'mb_urusan_ket'], 'string', 'max' => 45],
            [['mb_urusan_nama'], 'string', 'max' => 245],
            [['mb_urusan_jenis_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUrusanJenis::className(), 'targetAttribute' => ['mb_urusan_jenis_id' => 'mb_urusan_jenis_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_urusan_id' => 'ID',
            'mb_urusan_jenis_id' => 'Jenis Urusan',
            'mb_urusan_kode' => 'Kode Urusan',
            'mb_urusan_nama' => 'Nama Urusan',
            'mb_urusan_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusanJenis()
    {
        return $this->hasOne(MbUrusanJenis::className(), ['mb_urusan_jenis_id' => 'mb_urusan_jenis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusanHasSkpds()
    {
        return $this->hasMany(MbUrusanHasSkpd::className(), ['mb_urusan_id' => 'mb_urusan_id']);
    }
}
