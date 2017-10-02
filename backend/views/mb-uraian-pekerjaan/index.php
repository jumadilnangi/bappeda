<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbUraianPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Uraian Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <!--?= Html::button('Penyusunan Anggaran', ['value' => Url::to(['create']), 'class' => 'btn btn-danger','id'=>'modalButton']) ?-->
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>  Buat Uraian Pekerjaan', ['create'], ['class' => 'btn btn-danger']) ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],

                //'mb_uraian_pekerjaan_id',
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'width'=>'30px',
                    'value'=>function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl' => Url::to(['uraiandetail']),
                    'expandOneOnly' => true,
                    'expandIcon' => '<i class="fa fa-caret-right"></i>',
                    'collapseIcon' => '<i class="fa fa-caret-down"></i>',
                ],
                [
                    'header' => 'Status',
                    'value' => 'mbUraianPekerjaanHasStatus.mbUraianStatus.mb_uraian_status_nama',
                    'width' => '80px',
                    'mergeHeader' => true
                ], 
                // 'mb_renja_id',
                [
                    'attribute' => 'mb_renja_id',
                    'label' => 'Kegiatan',
                    'value' => 'mbRenja.mbKegiatan.mb_kegiatan_nama',
                ],
                // 'mb_sumber_dana_id',
                [
                    'attribute' => 'mb_sumber_dana_id',
                    'value' => 'mbSumberDana.mb_sumber_dana_nama'
                ],
                'mb_uraian_pekerjaan_nama:ntext',
                // 'mb_uraian_pekerjaan_vol',
                [
                    'attribute' => 'mb_uraian_pekerjaan_vol',
                    'width' => '50px',
                    'hAlign' => 'center',
                ],
                // 'mb_uraian_pekerjaan_satuan',
                [
                    'attribute' => 'mb_uraian_pekerjaan_satuan',
                    'width' => '50px',
                    'hAlign' => 'center',
                ],
                // 'mb_uraian_pekerjaan_harga_satuan',
                [
                    'attribute' => 'mb_uraian_pekerjaan_harga_satuan',
                    'value' => function($model) {
                        return 'Rp. '.number_format($model->mb_uraian_pekerjaan_harga_satuan,0,',','.');
                    },
                    'width' => '100px',
                    'hAlign' => 'right',
                ],
                // 'mb_uraian_pekerjaan_pagu_tahun_maju',
                [
                    //'header' => 'Pagu Tahun Maju',
                    'attribute' => 'mb_uraian_pekerjaan_pagu_tahun_maju',
                    'value' => function($model) {
                        return 'Rp. '.number_format($model->mb_uraian_pekerjaan_pagu_tahun_maju,0,',','.');
                    },
                    'width' => '100px',
                    'hAlign' => 'right'
                ],
                /*[
                    'header' => 'Lokasi',
                    'value' => function($model) {
                        $queryLokasi = Yii::$app->db->createCommand("SELECT CONCAT('Desa/Kelurahan ', kel.mb_kelurahan_desa_nama, ', Kecamatan ', kec.mb_kecamatan_nama, ', Kabupaten/Kota ', kab.mb_kabupaten_nama, ' Propinsi ',prov.mb_provinsi_nama) AS lokasi
                                FROM mb_lokasi_pekerjaan AS lok
                                JOIN mb_kelurahan_desa AS kel USING(mb_kelurahan_desa_id)
                                JOIN mb_kecamatan AS kec USING(mb_kecamatan_id)
                                JOIN mb_kabupaten_kota AS kab USING(mb_kabupaten_kota_id)
                                JOIN mb_provinsi AS prov USING(mb_provinsi_id)
                                WHERE lok.mb_uraian_pekerjaan_id = ".$model->mb_uraian_pekerjaan_id)
                            ->queryOne();
                        return Html::a($model->mbLokasiPekerjaan->mbKelurahanDesa->mb_kelurahan_desa_nama,
                            'javascript:void()', ['data-toggle' => 'tooltip', 
                            'data-placement' => 'bottom', 
                            'title' => $queryLokasi['lokasi']
                        ]);
                    },
                    'mergeHeader' => true,
                    'format' => 'raw',
                    'width' => '150px'
                ],*/
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => '',
                    'template' => '{update} {delete}',
                    'width' => '50px'
                ],
            ],
        ]); ?>
    </div>
</div>
