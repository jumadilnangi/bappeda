<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_uraian_pekerjaan_has_status".
 *
 * @property integer $mb_uraian_pekerjaan_has_status_id
 * @property integer $mb_uraian_pekerjaan_id
 * @property integer $mb_uraian_status_id
 * @property string $created_at
 * @property integer $created_by
 *
 * @property MbUraianPekerjaan $mbUraianPekerjaan
 * @property MbUraianStatus $mbUraianStatus
 */
class MbUraianPekerjaanHasStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_uraian_pekerjaan_has_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_uraian_pekerjaan_id', 'mb_uraian_status_id'], 'required'],
            [['mb_uraian_pekerjaan_id', 'mb_uraian_status_id', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['mb_uraian_pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUraianPekerjaan::className(), 'targetAttribute' => ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']],
            [['mb_uraian_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbUraianStatus::className(), 'targetAttribute' => ['mb_uraian_status_id' => 'mb_uraian_status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_uraian_pekerjaan_has_status_id' => 'Mb Uraian Pekerjaan Has Status ID',
            'mb_uraian_pekerjaan_id' => 'Mb Uraian Pekerjaan ID',
            'mb_uraian_status_id' => 'Mb Uraian Status ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaan()
    {
        return $this->hasOne(MbUraianPekerjaan::className(), ['mb_uraian_pekerjaan_id' => 'mb_uraian_pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianStatus()
    {
        return $this->hasOne(MbUraianStatus::className(), ['mb_uraian_status_id' => 'mb_uraian_status_id']);
    }
}
