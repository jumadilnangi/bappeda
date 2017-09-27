<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

use backend\models\MbTahunAnggaran;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Rencana Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <!--?= Html::button('Penyusunan Anggaran', ['value' => Url::to(['create']), 'class' => 'btn btn-danger','id'=>'modalButton']) ?-->
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>  Buat Rencana Kerja', ['create'], ['class' => 'btn btn-danger']) ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => [
                //['class' => 'kartik\grid\SerialColumn'],
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'width'=>'30px',
                    'value'=>function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'detailUrl' => Url::to(['detailrenja']),
                    'expandOneOnly' => true,
                    'expandIcon' => '<i class="fa fa-caret-right"></i>',
                    'collapseIcon' => '<i class="fa fa-caret-down"></i>',
                ],
               // 'mb_renja_id',
                //'mbTahunAnggaran.mb_tahun_anggaran_nama',
                /*[
                    'attribute' => 'mb_tahun_anggaran_nama',
                    'value' => 'mbTahunAnggaran.mb_tahun_anggaran_nama',
                    'label' => 'Thn. Anggaran',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter'=> ArrayHelper::map(
                        MbTahunAnggaran::find()
                            ->select('mb_tahun_anggaran_id, mb_tahun_anggaran_nama')
                            ->asArray()
                            ->all(),
                        'mb_tahun_anggaran_nama',
                        'mb_tahun_anggaran_nama'
                    ),
                    'filterWidgetOptions' => [
                        'theme' => 'bootstrap',
                        'pluginOptions' => ['allowClear'=>true],
                    ],
                    'filterInputOptions' => ['placeholder'=>'-'],
                ],*/
                // JENIS
                [
                    //'attribute' =>  'mbKegiatan.mbProgram.mbUrusanHasSkpd.mbUrusan.mbUrusanJenis.mb_urusan_jenis_nama',
                    'header' => 'Jenis Kegiatan',
                    'value' => function($model) {
                        return '<b>'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_kode.' - '.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_nama.'</b>';
                    },
                    'format' => 'raw',
                    'group'=>true,
                    'groupedRow'=>true,
                ],
                // URUSAN
                [
                    //'attribute' =>  'mbKegiatan.mbProgram.mbUrusanHasSkpd.mbUrusan.mb_urusan_nama',
                    'header' => 'Urusan',
                    'value' => function($model) {
                        return '<b>'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_kode.' - '.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_nama.'</b>';
                    },
                    'format' => 'raw',
                    'group'=>true,
                    'groupedRow'=>true,
                ],
                // SKPD
                [
                    //'attribute' =>  'mbKegiatan.mbProgram.mbUrusanHasSkpd.mbSkpd.mb_skpd_nama',
                    'header' => 'SKPD',
                    'value' => function($model) {
                        return '<b>'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbSkpd->mb_skpd_kode.' - '.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbSkpd->mb_skpd_nama.'</b>';
                    },
                    'format' => 'raw',
                    'group'=>true,
                    'groupedRow'=>true,
                ],
                // PROGRAM
                [
                    //'attribute' =>  'mbKegiatan.mbProgram.mb_program_nama',
                    'header' => 'Program',
                    'value' => function($model){
                        return '<b>'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbSkpd->mb_skpd_kode.'.'.$model->mbKegiatan->mbProgram->mb_program_kode.' - '.$model->mbKegiatan->mbProgram->mb_program_nama.'</b>';
                    },
                    'format' => 'raw',
                    'group'=>true,
                    'groupedRow'=>true,
                ],
                [
                    'header' => 'Kode',
                    'value' => function($model) {
                        return $model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mbUrusanJenis->mb_urusan_jenis_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_kode.'.'.$model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbSkpd->mb_skpd_kode.'.'.$model->mbKegiatan->mbProgram->mb_program_kode.'.'.$model->mbKegiatan->mb_kegiatan_kode;
                    },
                    'mergeHeader' => true,
                    'width' => '75px',
                    'hAlign' => 'center'
                ],
                // 'mb_kegiatan_id',
                [
                    //'attribute' => 'mb_kegiatan_id',
                    'header' => 'Kegiatan',
                    //'label' => 'Kegiatan',
                    'value' => 'mbKegiatan.mb_kegiatan_nama',
                    'mergeHeader' => true,
                ],
                // 'mb_renja_pagu_indikatif',
                [
                    'header' => 'Pagu Indikatif',
                    //'value' => 'mb_renja_pagu_indikatif',
                    'value' => function($model) {
                        return 'Rp. <span style="text-align: right;">'.number_format($model->mb_renja_pagu_indikatif,0,',','.').'</spam>';
                    },
                    'format' => 'raw',
                    'mergeHeader' => true,
                    'width' => '150px'
                ],
                //'mbSasaran.mb_sasaran_nama',
                //'mb_renja_indikator_kegiatan:ntext',
                // 'mb_renja_pagu_indikatif',
                // 'mb_renja_indikator_keg:ntext',
                // 'mb_renja_sasaran_keg:ntext',
                // 'mb_renja_hasil_prog_tolak_ukur',
                // 'mb_renja_hasil_prog_target_kerja',
                // 'mb_renja_keluaran_tolak_ukur',
                // 'mb_renja_keluaran_tolak_target_kerja',
                // 'mb_renja_hasil_kerja_tolak_ukur',
                // 'mb_renja_hasil_kerja_tolak_target_kerja',
                // 'mb_renja_target_capaian',
                // 'mb_renja_target_capaian_thn_maju',
                // 'mb_renja_ket:ntext',

                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{update} {delete}'
                ],
            ],
        ]); ?>    
    </div>
</div>
