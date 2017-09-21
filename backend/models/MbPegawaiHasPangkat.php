<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_pangkat".
 *
 * @property integer $mb_pegawai_has_pangkat_id
 * @property integer $mb_pegawai_id
 * @property integer $m_pegawai_pangkat_id
 * @property string $mb_pegawai_has_pangkat_mulai
 * @property string $mb_pegawai_has_pangkat_akhir
 * @property string $mb_pegawai_has_pangkat_file
 * @property string $mb_pegawai_has_pangkat_ket
 * @property string $mb_pegawai_has_pangkat_created_at
 *
 * @property MbPegawai $mbPegawai
 * @property MbPegawaiPangkat $mPegawaiPangkat
 */
class MbPegawaiHasPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'm_pegawai_pangkat_id'], 'required'],
            [['mb_pegawai_id', 'm_pegawai_pangkat_id'], 'integer'],
            [['mb_pegawai_has_pangkat_mulai', 'mb_pegawai_has_pangkat_akhir', 'mb_pegawai_has_pangkat_created_at'], 'safe'],
            [['mb_pegawai_has_pangkat_file', 'mb_pegawai_has_pangkat_ket'], 'string', 'max' => 45],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['m_pegawai_pangkat_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawaiPangkat::className(), 'targetAttribute' => ['m_pegawai_pangkat_id' => 'mb_pegawai_pangkat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_pangkat_id' => 'Mb Pegawai Has Pangkat ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'm_pegawai_pangkat_id' => 'M Pegawai Pangkat ID',
            'mb_pegawai_has_pangkat_mulai' => 'Mb Pegawai Has Pangkat Mulai',
            'mb_pegawai_has_pangkat_akhir' => 'Mb Pegawai Has Pangkat Akhir',
            'mb_pegawai_has_pangkat_file' => 'Mb Pegawai Has Pangkat File',
            'mb_pegawai_has_pangkat_ket' => 'Mb Pegawai Has Pangkat Ket',
            'mb_pegawai_has_pangkat_created_at' => 'Mb Pegawai Has Pangkat Created At',
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
    public function getMPegawaiPangkat()
    {
        return $this->hasOne(MbPegawaiPangkat::className(), ['mb_pegawai_pangkat_id' => 'm_pegawai_pangkat_id']);
    }
}
