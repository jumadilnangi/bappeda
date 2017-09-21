<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_skpd_has_pegawai".
 *
 * @property integer $mb_skpd_has_pegawai_id
 * @property integer $mb_skpd_id
 * @property integer $mb_pegawai_id
 * @property integer $mb_pegawai_jabatan_id
 * @property string $mb_skpd_has_pegawai_mulai
 * @property string $mb_skpd_has_pegawai_akhir
 * @property string $mb_skpd_has_pegawai_sk
 * @property string $mb_skpd_has_pegawai_ket
 *
 * @property MbPegawai $mbPegawai
 * @property MbPegawaiJabatan $mbPegawaiJabatan
 * @property MbSkpd $mbSkpd
 */
class MbSkpdHasPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_skpd_has_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_id', 'mb_pegawai_id', 'mb_pegawai_jabatan_id'], 'required'],
            [['mb_skpd_id', 'mb_pegawai_id', 'mb_pegawai_jabatan_id'], 'integer'],
            [['mb_skpd_has_pegawai_mulai', 'mb_skpd_has_pegawai_akhir'], 'safe'],
            [['mb_skpd_has_pegawai_sk'], 'string', 'max' => 45],
            [['mb_skpd_has_pegawai_ket'], 'string', 'max' => 145],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['mb_pegawai_jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawaiJabatan::className(), 'targetAttribute' => ['mb_pegawai_jabatan_id' => 'mb_pegawai_jabatan_id']],
            [['mb_skpd_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbSkpd::className(), 'targetAttribute' => ['mb_skpd_id' => 'mb_skpd_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_skpd_has_pegawai_id' => 'Mb Skpd Has Pegawai ID',
            'mb_skpd_id' => 'Mb Skpd ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_pegawai_jabatan_id' => 'Mb Pegawai Jabatan ID',
            'mb_skpd_has_pegawai_mulai' => 'Mb Skpd Has Pegawai Mulai',
            'mb_skpd_has_pegawai_akhir' => 'Mb Skpd Has Pegawai Akhir',
            'mb_skpd_has_pegawai_sk' => 'Mb Skpd Has Pegawai Sk',
            'mb_skpd_has_pegawai_ket' => 'Mb Skpd Has Pegawai Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawai()
    {
        return $this->hasOne(MbPegawai::className(), ['mb_pegawai_id' => 'mb_pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawaiJabatan()
    {
        return $this->hasOne(MbPegawaiJabatan::className(), ['mb_pegawai_jabatan_id' => 'mb_pegawai_jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSkpd()
    {
        return $this->hasOne(MbSkpd::className(), ['mb_skpd_id' => 'mb_skpd_id']);
    }
}
