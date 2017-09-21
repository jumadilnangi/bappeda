<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rka".
 *
 * @property integer $mb_skpd_has_rekening_rincian_id
 * @property integer $kode_jenis_urusan
 * @property string $nama_jenis_urusan
 * @property string $kode_urusan
 * @property string $nama_urusan
 * @property string $kode_skpd
 * @property string $nama_skpd
 * @property string $kode_struk
 * @property string $nama_struk
 * @property integer $kode_kelompok
 * @property string $nama_kelompok
 * @property integer $kode_jenis
 * @property string $nama_jenis
 * @property string $kode_obyek
 * @property string $nama_obyek
 * @property string $kode_rincian
 * @property string $nama_rincian
 * @property string $penjabaran
 * @property integer $volume
 * @property string $satuan
 * @property double $harga
 */
class Rka extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rka';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mb_skpd_has_rekening_rincian_id'], 'required'],
            [['mb_skpd_has_rekening_rincian_id','mb_skpd_has_rekening_rincian_ta', 'kode_jenis_urusan', 'kode_kelompok', 'kode_jenis', 'volume'], 'integer'],
            [['penjabaran'], 'string'],
            [['harga'], 'number'],
            [['nama_jenis_urusan', 'kode_urusan', 'kode_skpd', 'satuan'], 'string', 'max' => 45],
            [['nama_urusan', 'nama_skpd'], 'string', 'max' => 245],
            [['kode_struk', 'kode_obyek', 'kode_rincian'], 'string', 'max' => 2],
            [['nama_struk', 'nama_kelompok', 'nama_jenis', 'nama_obyek', 'nama_rincian'], 'string', 'max' => 145],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mb_skpd_has_rekening_rincian_id' => 'Mb Skpd Has Rekening Rincian ID',
            'mb_skpd_has_rekening_rincian_ta'=> 'Tahun Anggaran',
            'kode_jenis_urusan' => 'Kode Jenis Urusan',
            'nama_jenis_urusan' => 'Nama Jenis Urusan',
            'kode_urusan' => 'Kode Urusan',
            'nama_urusan' => 'Nama Urusan',
            'kode_skpd' => 'Kode Skpd',
            'nama_skpd' => 'Nama Skpd',
            'kode_struk' => 'Kode Struk',
            'nama_struk' => 'Nama Struk',
            'kode_kelompok' => 'Kode Kelompok',
            'nama_kelompok' => 'Nama Kelompok',
            'kode_jenis' => 'Kode Jenis',
            'nama_jenis' => 'Nama Jenis',
            'kode_obyek' => 'Kode Obyek',
            'nama_obyek' => 'Nama Obyek',
            'kode_rincian' => 'Kode Rincian',
            'nama_rincian' => 'Nama Rincian',
            'penjabaran' => 'Penjabaran',
            'volume' => 'Volume',
            'satuan' => 'Satuan',
            'harga' => 'Harga',
        ];
    }
    
    public function totalHarga()
    {
        $total=$this->harga * $this->volume;
        return $total;
    }
}
