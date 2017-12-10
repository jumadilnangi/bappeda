<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbIndikatorKinerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Indikator Kinerja';
$this->params['breadcrumbs'][] = $this->title;

$js = <<< JS
    $(".btn-fresh").click(function(){
        $.pjax.reload({container:'#grid_container'});
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <?php 
            echo Html::a('<i class="fa fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']).' '.
                Html::button('<i class="fa fa-history" aria-hidden="true"></i> Refesh', ['class' => 'btn btn-primary btn-fresh']);
        ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php 
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout'=>true,
                    'options' => [
                        'id'=>'grid_container',
                    ],
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    //'mb_indikator_kinerja_id',
                    //'mbRpjmdSasaran.mb_sasaran_isi',
                    [
                        'attribute' => 'mb_sasaran_id',
                        'value' => function($model){
                            return 'Sasaran: <strong>'.$model->mbRpjmdSasaran->mb_sasaran_isi.'</strong>';
                        },
                        'format' => 'raw',
                        'group'=>true,
                        'groupedRow'=>true,
                    ],
                    'mb_indikator_kinerja_isi:ntext',
                    'mb_indikator_kinerja_satuan',
                    'mb_indikator_kinerja_awal',
                    'mb_indikator_kinerja_target_1',
                     'mb_indikator_kinerja_target_2',
                    'mb_indikator_kinerja_target_3',
                    'mb_indikator_kinerja_target_4',
                    'mb_indikator_kinerja_target_5',
                    // 'mb_indikator_kinerja_ket',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function($url, $model) {
                                $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                                return Html::a($icon, $url);
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
                'layout' => '<div class="table-responsive">{items}</div>
                                    <div class="pull-left">{summary}</div>
                                    <div class="pull-right">{pager}</div>',
            ]); 
        ?>
    </div>
</div>