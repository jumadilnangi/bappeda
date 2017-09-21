<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_program".
 *
 * @property integer $mb_program_id
 * @property integer $mb_urusan_has_skpd_id
 * @property string $mb_program_kode
 * @property string $mb_program_nama
 * @property string $mb_program_ket
 *
 * @property MbKegiatan[] $mbKegiatans
 * @property MbUrusanHasSkpd $mbUrusanHasSkpd
 */
class MbProgram extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_has_skpd_id'], 'required'],
            [['mb_urusan_has_skpd_id'], 'integer'],
            [['mb_program_kode', 'mb_program_ket'], 'string', 'max' => 45],
            [['mb_program_nama'], 'string', 'max' => 145],
            [['mb_urusan_has_skpd_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUrusanHasSkpd::className(), 'targetAttribute' => ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_program_id' => 'Mb Program ID',
            'mb_urusan_has_skpd_id' => 'Mb Urusan Has Skpd ID',
            'mb_program_kode' => 'Mb Program Kode',
            'mb_program_nama' => 'Mb Program Nama',
            'mb_program_ket' => 'Mb Program Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKegiatans()
    {
        return $this->hasMany(MbKegiatan::className(), ['mb_program_id' => 'mb_program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusanHasSkpd()
    {
        return $this->hasOne(MbUrusanHasSkpd::className(), ['mb_urusan_has_skpd_id' => 'mb_urusan_has_skpd_id']);
    }
}
