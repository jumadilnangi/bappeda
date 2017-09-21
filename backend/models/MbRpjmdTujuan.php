<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_rpjmd_tujuan".
 *
 * @property integer $mb_rpjmd_tujuan_id
 * @property integer $mb_rpjmd_misi_id
 * @property string $mb_tujuan_isi
 * @property string $mb_tujuan_ket
 *
 * @property MbRpjmdMisi $mbRpjmdMisi
 */
class MbRpjmdTujuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_rpjmd_tujuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_rpjmd_misi_id'], 'required'],
            [['mb_rpjmd_misi_id'], 'integer'],
            [['mb_tujuan_isi'], 'string'],
            [['mb_tujuan_ket'], 'string', 'max' => 45],
            [['mb_rpjmd_misi_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbRpjmdMisi::className(), 'targetAttribute' => ['mb_rpjmd_misi_id' => 'mb_rpjmd_misi_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_rpjmd_tujuan_id' => 'Mb Rpjmd Tujuan ID',
            'mb_rpjmd_misi_id' => 'Mb Rpjmd Misi ID',
            'mb_tujuan_isi' => 'Mb Tujuan Isi',
            'mb_tujuan_ket' => 'Mb Tujuan Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbRpjmdMisi()
    {
        return $this->hasOne(MbRpjmdMisi::className(), ['mb_rpjmd_misi_id' => 'mb_rpjmd_misi_id']);
    }
}
