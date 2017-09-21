<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_uraian_status".
 *
 * @property integer $mb_uraian_status_id
 * @property string $mb_uraian_status_nama
 *
 * @property MbUraianPekerjaanHasStatus[] $mbUraianPekerjaanHasStatuses
 */
class MbUraianStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_uraian_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_uraian_status_nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_uraian_status_id' => 'Mb Uraian Status ID',
            'mb_uraian_status_nama' => 'Mb Uraian Status Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaanHasStatuses()
    {
        return $this->hasMany(MbUraianPekerjaanHasStatus::className(), ['mb_uraian_status_id' => 'mb_uraian_status_id']);
    }
}
