<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

use backend\models\MbSkpd;
use backend\models\MbRekeningRincian;
use backend\models\MbTahunAnggaran;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSkpdHasRekeningRincianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penyusunan Anggaran';
$this->params['breadcrumbs'][] = $this->title;

$ta = [];
//for ($i=1980; $i <= date('Y'); $i++) { 
for ($i=date('Y')+1; $i >= 1985 ; $i--) { 
    $ta[$i] = $i;
}

$js = <<< JS
    $('#frmModal').on("show.bs.modal", function(event) {
        var btn = $(event.relatedTarget)
        var url = btn.attr("href");
        $.pjax.reload("#pjax-modal", {
            "timeout": false,
            "url": url,
            "replace": false
        })
    })
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <!--?= Html::button('Penyusunan Anggaran', ['value' => Url::to(['create']), 'class' => 'btn btn-danger','id'=>'modalButton']) ?-->
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>  Penyusunan Anggaran', ['create'], ['class' => 'btn btn-danger']) ?>
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
                    ['class' => 'kartik\grid\SerialColumn'],
                    [
                        'class'=>'kartik\grid\ExpandRowColumn',
                        //'width'=>'50px',
                        'value'=>function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detailUrl' => Url::to(['detailanggaran']),
                        'expandOneOnly' => true,
                        'expandIcon' => '<i class="fa fa-caret-right"></i>',
                        'collapseIcon' => '<i class="fa fa-caret-down"></i>',
                        //'expandAllTitle' => 'Lihat semua history',
                        //'collapseAllTitle' => 'Tutup semua',
                    ],
                    //'mb_skpd_has_rekening_rincian_id',
                    // 'mb_skpd_has_rekening_rincian_ta',
                    [
                        'attribute' => 'mb_skpd_has_rekening_rincian_ta',
                        'label' => 'Thn Anggr.',
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
                        'filterInputOptions' => ['placeholder'=>'Filter TA..'],
                        'width' => '50px',
                        'hAlign' => 'center'
                    ],
                    //'mb_urusan_has_skpd_id',
                    [
                        'attribute' => 'mb_urusan_has_skpd_id',
                        'label' => 'Nama SKPD',
                        'value' => 'mbUrusanHasSkpd.mbSkpd.mb_skpd_nama',
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter'=> ArrayHelper::map(
                            MbSkpd::find()
                                ->select('mb_skpd_id, mb_skpd_nama')
                                ->asArray()
                                ->all(),
                            'mb_skpd_id',
                            'mb_skpd_nama'
                        ),
                        'filterWidgetOptions' => [
                            //'size' => 'sm',
                            'theme' => 'bootstrap',
                            'pluginOptions' => [
                                'allowClear'=>true,
                            ],
                        ],
                        'filterInputOptions' => ['placeholder'=>'Filter SKPD...'],
                    ],
                    // 'mb_rekening_rincian_id',
                    [
                        'attribute' => 'mb_rekening_rincian_id',
                        'value' => 'mbRekeningRincian.mb_rekening_rincian_nama',
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter'=> ArrayHelper::map(
                            MbRekeningRincian::find()
                                ->select('mb_rekening_rincian_id, mb_rekening_rincian_nama')
                                ->asArray()
                                ->all(),
                            'mb_rekening_rincian_id',
                            'mb_rekening_rincian_nama'
                        ),
                        'filterWidgetOptions' => [
                            //'size' => 'sm',
                            'theme' => 'bootstrap',
                            'pluginOptions' => [
                                'allowClear'=>true,
                            ],
                        ],
                        'filterInputOptions' => ['placeholder'=>'Filter Biaya...'],
                    ],
                    // 'mbRekeningRincian.mb_rekening_rincian_nama',
                    //'mb_skpd_has_rekening_rincian_penjabaran:ntext',
                    // 'mb_skpd_has_rekening_rincian_vol',
                    // 'mb_skpd_has_rekening_rincian_satuan',
                    // 'mb_skpd_has_rekening_rincian_harga',
                    // 'mb_skpd_has_rekening_rincian_ket',
                    // 'mb_skpd_has_rekening_rincian_created_at',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => '',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function($url, $model) {
                                $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                                return Html::a($icon, $url, [
                                    //'id' => 'modalButton'
                                    //'data-toggle' => 'modal',
                                    //'data-target' => '#frmModal'
                                ]);
                            },
                            'delete' => function($url, $model) {
                                $icon = '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                return Html::a($icon, $url, [
                                    'data-confirm' => 'Anda yakin menghapus data ini?',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);
                            },
                        ]
                    ],
                ],
            ]); 
        ?>
    </div>
</div>
