<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_tahun_anggaran".
 *
 * @property integer $mb_tahun_anggaran_id
 * @property string $mb_tahun_anggaran_nama
 * @property string $mb_tahun_anggaran_ket
 *
 * @property MbRenja[] $mbRenjas
 */
class MbTahunAnggaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_tahun_anggaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['mb_tahun_anggaran_id'], 'required'],
            [['mb_tahun_anggaran_nama'], 'required'],
            [['mb_tahun_anggaran_id'], 'integer'],
            [['mb_tahun_anggaran_nama'], 'safe'],
            [['mb_tahun_anggaran_ket'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_tahun_anggaran_id' => 'ID Tahun Anggaran ',
            'mb_tahun_anggaran_nama' => 'Tahun Anggaran',
            'mb_tahun_anggaran_ket' => 'Keterangan ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRenjas()
    {
        return $this->hasMany(MbRenja::className(), ['mb_tahun_anggaran_id' => 'mb_tahun_anggaran_id']);
    }
}
