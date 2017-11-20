<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rekening_struk".
 *
 * @property integer $mb_rekening_struk_id
 * @property string $mb_rekening_struk_kode
 * @property string $mb_rekening_struk_nama
 * @property string $mb_rekening_struk_ket
 *
 * @property MbRekeningKelompok[] $mbRekeningKelompoks
 */
class MbRekeningStruk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rekening_struk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_struk_kode', 'mb_rekening_struk_nama'], 'required'],
            [['mb_rekening_struk_kode'], 'string', 'max' => 2],
            [['mb_rekening_struk_nama'], 'string', 'max' => 145],
            [['mb_rekening_struk_ket'], 'string', 'max' => 45],
            [['mb_rekening_struk_kode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rekening_struk_id' => 'ID struk Rekening ',
            'mb_rekening_struk_kode' => 'Kode Struk Rekening',
            'mb_rekening_struk_nama' => 'Nama Struk Rekening ',
            'mb_rekening_struk_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningKelompoks()
    {
        return $this->hasMany(MbRekeningKelompok::className(), ['mb_rekening_struk_id' => 'mb_rekening_struk_id']);
    }
}
