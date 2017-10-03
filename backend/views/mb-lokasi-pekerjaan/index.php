<?php

use yii\helpers\Url;
use yii\helpers\Html;

use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbLokasiPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokasi Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <!--?= Html::button('Penyusunan Anggaran', ['value' => Url::to(['create']), 'class' => 'btn btn-danger','id'=>'modalButton']) ?-->
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>  Buat Lokasi Pekerjaan', ['create'], ['class' => 'btn btn-danger']) ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],

                // 'mb_lokasi_pekerjaan_id',
                // 'mb_uraian_pekerjaan_id',
                [
                    'attribute' => 'mb_uraian_pekerjaan_id',
                    'value' => 'mbUraianPekerjaan.mb_uraian_pekerjaan_nama',
                ],
                // 'mb_kelurahan_desa_id',
                [
                    'attribute' => 'mb_kelurahan_desa_id',
                    'value' => 'mbKelurahanDesa.mb_kelurahan_desa_nama',
                ],
                // 'mb_lokasi_pekerjaan_latitudes',
                [
                    'attribute' => 'mb_lokasi_pekerjaan_latitudes',
                    'width' => '100px',
                    'hAlign' => 'right'
                ],
                // 'mb_lokasi_pekerjaan_longitudes',
                [
                    'attribute' => 'mb_lokasi_pekerjaan_longitudes',
                    'width' => '100px',
                    'hAlign' => 'right'
                ],
                // 'mb_lokasi_pekerjaan_rw',
                [
                    'attribute' => 'mb_lokasi_pekerjaan_rw',
                    'width' => '50px',
                    'hAlign' => 'center'
                ],
                // 'mb_lokasi_pekerjaan_rt',
                [
                    'attribute' => 'mb_lokasi_pekerjaan_rt',
                    'width' => '50px',
                    'hAlign' => 'center'
                ],
                // 'mb_lokasi_pekerjaan_ket',

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