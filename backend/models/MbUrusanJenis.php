<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_urusan_jenis".
 *
 * @property integer $mb_urusan_jenis_id
 * @property integer $mb_urusan_jenis_kode
 * @property string $mb_urusan_jenis_nama
 *
 * @property MbUrusan[] $mbUrusans
 */
class MbUrusanJenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_urusan_jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_urusan_jenis_kode'], 'integer'],
            [['mb_urusan_jenis_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_urusan_jenis_id' => 'ID',
            'mb_urusan_jenis_kode' => 'Kode',
            'mb_urusan_jenis_nama' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUrusans()
    {
        return $this->hasMany(MbUrusan::className(), ['mb_urusan_jenis_id' => 'mb_urusan_jenis_id']);
    }
}
