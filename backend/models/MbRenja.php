<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mb_renja".
 *
 * @property integer $mb_renja_id
 * @property integer $mb_tahun_anggaran_id
 * @property integer $mb_kegiatan_id
 * @property integer $mb_sasaran_id
 * @property string $mb_renja_indikator_kegiatan
 * @property double $mb_renja_pagu_indikatif
 * @property string $mb_renja_indikator_keg
 * @property string $mb_renja_sasaran_keg
 * @property string $mb_renja_hasil_prog_tolak_ukur
 * @property string $mb_renja_hasil_prog_target_kerja
 * @property string $mb_renja_keluaran_tolak_ukur
 * @property string $mb_renja_keluaran_tolak_target_kerja
 * @property string $mb_renja_hasil_kerja_tolak_ukur
 * @property string $mb_renja_hasil_kerja_tolak_target_kerja
 * @property string $mb_renja_target_capaian
 * @property string $mb_renja_target_capaian_thn_maju
 * @property string $mb_renja_ket
 *
 * @property MbKegiatan $mbKegiatan
 * @property MbSasaran $mbSasaran
 * @property MbTahunAnggaran $mbTahunAnggaran
 * @property MbUraianPekerjaan[] $mbUraianPekerjaans
 */
class MbRenja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mb_renja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_tahun_anggaran_id', 'mb_kegiatan_id', 'mb_sasaran_id'], 'required'],
            [['mb_tahun_anggaran_id', 'mb_kegiatan_id', 'mb_sasaran_id'], 'integer'],
            [['mb_renja_indikator_kegiatan', 'mb_renja_indikator_keg', 'mb_renja_sasaran_keg', 'mb_renja_ket'], 'string'],
            [['mb_renja_pagu_indikatif'], 'number'],
            [['mb_renja_hasil_prog_tolak_ukur', 'mb_renja_hasil_prog_target_kerja', 'mb_renja_keluaran_tolak_ukur', 'mb_renja_keluaran_tolak_target_kerja', 'mb_renja_hasil_kerja_tolak_ukur', 'mb_renja_hasil_kerja_tolak_target_kerja'], 'string', 'max' => 245],
            [['mb_renja_target_capaian', 'mb_renja_target_capaian_thn_maju'], 'string', 'max' => 45],
            [['mb_kegiatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbKegiatan::className(), 'targetAttribute' => ['mb_kegiatan_id' => 'mb_kegiatan_id']],
            [['mb_sasaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbSasaran::className(), 'targetAttribute' => ['mb_sasaran_id' => 'mb_sasaran_id']],
            [['mb_tahun_anggaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MbTahunAnggaran::className(), 'targetAttribute' => ['mb_tahun_anggaran_id' => 'mb_tahun_anggaran_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_renja_id' => 'Mb Renja ID',
            'mb_tahun_anggaran_id' => 'Tahun Anggaran',
            'mb_kegiatan_id' => 'Kegiatan ',
            'mb_sasaran_id' => 'Sasaran',
            'mb_renja_indikator_kegiatan' => 'Indikator Kegiatan',
            'mb_renja_pagu_indikatif' => 'Pagu Indikatif',
            'mb_renja_indikator_keg' => 'Indikator Kegiatan',
            'mb_renja_sasaran_keg' => 'Sasaran Kegiatan',
            'mb_renja_hasil_prog_tolak_ukur' => 'Tolak Ukur Hasil Program',
            'mb_renja_hasil_prog_target_kerja' => 'Target Kerja Hasil Program',
            'mb_renja_keluaran_tolak_ukur' => 'Tolak Ukur Keluaran',
            'mb_renja_keluaran_tolak_target_kerja' => 'Target Kerja Keluaran',
            'mb_renja_hasil_kerja_tolak_ukur' => 'Tolak Ukur Hasil Kerja',
            'mb_renja_hasil_kerja_tolak_target_kerja' => 'Target Kerja Hasil Kerja',
            'mb_renja_target_capaian' => 'Target Capaian',
            'mb_renja_target_capaian_thn_maju' => 'Target Capaian Tahun Maju',
            'mb_renja_ket' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbKegiatan()
    {
        return $this->hasOne(MbKegiatan::className(), ['mb_kegiatan_id' => 'mb_kegiatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbSasaran()
    {
        return $this->hasOne(MbSasaran::className(), ['mb_sasaran_id' => 'mb_sasaran_id']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbTahunAnggaran()
    {
        return $this->hasOne(MbTahunAnggaran::className(), ['mb_tahun_anggaran_id' => 'mb_tahun_anggaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMbUraianPekerjaans()
    {
        return $this->hasMany(MbUraianPekerjaan::className(), ['mb_renja_id' => 'mb_renja_id']);
    }
}