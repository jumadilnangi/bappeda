<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_urusan_has_skpd".
 *
 * @property integer $mb_urusan_has_skpd_id
 * @property integer $mb_urusan_id
 * @property integer $mb_skpd_id
 * @property string $mb_urusan_has_skpd_mulai
 * @property string $mb_urusan_has_skpd_akhir
 * @property string $mb_urusan_has_skpd_sk
 * @property string $mb_urusan_has_skpd_ket
 *
 * @property MbProgram[] $mbPrograms
 * @property MbSkpdHasRekeningRincian[] $mbSkpdHasRekeningRincians
 * @property MbSkpd $mbSkpd
 * @property MbUrusan $mbUrusan
 */
class MbUrusanHasSkpd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_urusan_has_skpd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_id'], 'required'],
            [['mb_urusan_id', 'mb_skpd_id'], 'integer'],
            [['mb_urusan_has_skpd_mulai', 'mb_urusan_has_skpd_akhir'], 'safe'],
            [['mb_urusan_has_skpd_sk'], 'string', 'max' => 145],
            [['mb_urusan_has_skpd_ket'], 'string', 'max' => 45],
            [['mb_skpd_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbSkpd::className(), 'targetAttribute' => ['mb_skpd_id' => 'mb_skpd_id']],
            [['mb_urusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUrusan::className(), 'targetAttribute' => ['mb_urusan_id' => 'mb_urusan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_urusan_has_skpd_id' => 'ID',
            'mb_urusan_id' => 'Urusan',
            'mb_skpd_id' => 'SKPD',
            'mb_urusan_has_skpd_mulai' => 'Mulai',
            'mb_urusan_has_skpd_akhir' => ' Akhir',
            'mb_urusan_has_skpd_sk' => 'SK',
            'mb_urusan_has_skpd_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPrograms()
    {
        return $this->hasMany(MbProgram::className(), ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpdHasRekeningRincians()
    {
        return $this->hasMany(MbSkpdHasRekeningRincian::className(), ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpd()
    {
        return $this->hasOne(MbSkpd::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusan()
    {
        return $this->hasOne(MbUrusan::className(), ['mb_urusan_id' => 'mb_urusan_id']);
    }
}
