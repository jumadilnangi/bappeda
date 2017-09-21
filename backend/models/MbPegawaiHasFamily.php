<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_pegawai_has_family".
 *
 * @property integer $mb_pegawai_has_family_id
 * @property integer $mb_pegawai_id
 * @property integer $mb_pegawai_family_id
 * @property string $mb_pegawai_has_family_nik
 * @property string $mb_pegawai_has_family_nama
 * @property string $mb_pegawai_has_family_tgl_lahir
 * @property string $mb_pegawai_has_family_t4_lahir
 * @property string $mb_pegawai_has_family_foto
 *
 * @property MbPegawai $mbPegawai
 * @property MbPegawaiFamily $mbPegawaiFamily
 */
class MbPegawaiHasFamily extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_pegawai_has_family';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_pegawai_id', 'mb_pegawai_family_id'], 'required'],
            [['mb_pegawai_id', 'mb_pegawai_family_id'], 'integer'],
            [['mb_pegawai_has_family_tgl_lahir'], 'safe'],
            [['mb_pegawai_has_family_nik', 'mb_pegawai_has_family_foto'], 'string', 'max' => 45],
            [['mb_pegawai_has_family_nama', 'mb_pegawai_has_family_t4_lahir'], 'string', 'max' => 145],
            [['mb_pegawai_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawai::className(), 'targetAttribute' => ['mb_pegawai_id' => 'mb_pegawai_id']],
            [['mb_pegawai_family_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbPegawaiFamily::className(), 'targetAttribute' => ['mb_pegawai_family_id' => 'mb_pegawai_family_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_pegawai_has_family_id' => 'Mb Pegawai Has Family ID',
            'mb_pegawai_id' => 'Mb Pegawai ID',
            'mb_pegawai_family_id' => 'Mb Pegawai Family ID',
            'mb_pegawai_has_family_nik' => 'Mb Pegawai Has Family Nik',
            'mb_pegawai_has_family_nama' => 'Mb Pegawai Has Family Nama',
            'mb_pegawai_has_family_tgl_lahir' => 'Mb Pegawai Has Family Tgl Lahir',
            'mb_pegawai_has_family_t4_lahir' => 'Mb Pegawai Has Family T4 Lahir',
            'mb_pegawai_has_family_foto' => 'Mb Pegawai Has Family Foto',
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
    public function getMbPegawaiFamily()
    {
        return $this->hasOne(MbPegawaiFamily::className(), ['mb_pegawai_family_id' => 'mb_pegawai_family_id']);
    }
}
