<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_kegiatan".
 *
 * @property integer $mb_kegiatan_id
 * @property integer $mb_program_id
 * @property string $mb_kegiatan_kode
 * @property string $mb_kegiatan_nama
 * @property string $mb_kegiatan_ket
 *
 * @property MbProgram $mbProgram
 * @property MbRenja[] $mbRenjas
 */
class MbKegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_kegiatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_program_id', 'mb_kegiatan_kode', 'mb_kegiatan_nama'], 'required'],
            [['mb_kegiatan_id', 'mb_program_id'], 'integer'],
            [['mb_kegiatan_kode', 'mb_kegiatan_ket'], 'string', 'max' => 45],
            [['mb_kegiatan_nama'], 'string', 'max' => 345],
            [['mb_program_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbProgram::className(), 'targetAttribute' => ['mb_program_id' => 'mb_program_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_kegiatan_id' => 'ID Kegiatan',
            'mb_program_id' => 'Program',
            'mb_kegiatan_kode' => 'Kode Kegiatan',
            'mb_kegiatan_nama' => 'Nama Kegiatan',
            'mb_kegiatan_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbProgram()
    {
        return $this->hasOne(MbProgram::className(), ['mb_program_id' => 'mb_program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRenjas()
    {
        return $this->hasMany(MbRenja::className(), ['mb_kegiatan_id' => 'mb_kegiatan_id']);
    }
}
