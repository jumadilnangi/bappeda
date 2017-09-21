<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rekening_obyek".
 *
 * @property integer $mb_rekening_obyek_id
 * @property integer $mb_rekening_jenis_id
 * @property string $mb_rekening_obyek_kode
 * @property string $mb_rekening_obyek_nama
 * @property string $mb_rekening_obyek_ket
 *
 * @property MbRekeningJenis $mbRekeningJenis
 * @property MbRekeningRincian[] $mbRekeningRincians
 */
class MbRekeningObyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rekening_obyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rekening_jenis_id'], 'required'],
            [['mb_rekening_jenis_id'], 'integer'],
            [['mb_rekening_obyek_kode'], 'string', 'max' => 2],
            [['mb_rekening_obyek_nama'], 'string', 'max' => 145],
            [['mb_rekening_obyek_ket'], 'string', 'max' => 45],
            [['mb_rekening_jenis_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRekeningJenis::className(), 'targetAttribute' => ['mb_rekening_jenis_id' => 'mb_rekening_jenis_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rekening_obyek_id' => 'Mb Rekening Obyek ID',
            'mb_rekening_jenis_id' => 'Mb Rekening Jenis ID',
            'mb_rekening_obyek_kode' => 'Mb Rekening Obyek Kode',
            'mb_rekening_obyek_nama' => 'Mb Rekening Obyek Nama',
            'mb_rekening_obyek_ket' => 'Mb Rekening Obyek Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningJenis()
    {
        return $this->hasOne(MbRekeningJenis::className(), ['mb_rekening_jenis_id' => 'mb_rekening_jenis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRekeningRincians()
    {
        return $this->hasMany(MbRekeningRincian::className(), ['mb_rekening_obyek_id' => 'mb_rekening_obyek_id']);
    }
}
