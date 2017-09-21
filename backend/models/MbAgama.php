<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_agama".
 *
 * @property integer $mb_agama_id
 * @property string $mb_agama_nama
 *
 * @property MbPegawai[] $mbPegawais
 */
class MbAgama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_agama_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_agama_id' => 'Mb Agama ID',
            'mb_agama_nama' => 'Mb Agama Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbPegawais()
    {
        return $this->hasMany(MbPegawai::className(), ['mb_agama_id' => 'mb_agama_id']);
    }
}
