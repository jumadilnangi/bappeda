<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_sumber_dana".
 *
 * @property integer $mb_sumber_dana_id
 * @property string $mb_sumber_dana_nama
 *
 * @property MbUraianPekerjaan[] $mbUraianPekerjaans
 */
class MbSumberDana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_sumber_dana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_sumber_dana_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_sumber_dana_id' => 'ID Sumber Dana',
            'mb_sumber_dana_nama' => 'Sumber Dana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaans()
    {
        return $this->hasMany(MbUraianPekerjaan::className(), ['mb_sumber_dana_id' => 'mb_sumber_dana_id']);
    }
}
