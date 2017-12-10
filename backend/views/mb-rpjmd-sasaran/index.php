<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Sasaran';
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
                    [
                        'class'=>'kartik\grid\ExpandRowColumn',
                        'width'=>'30px',
                        'value'=>function ($model, $key, $index, $column) {
                            return GridView::ROW_COLLAPSED;
                        },
                        'detailUrl' => Url::to(['detailindikator']),
                        'expandOneOnly' => true,
                        'expandIcon' => '<i class="fa fa-caret-right"></i>',
                        'collapseIcon' => '<i class="fa fa-caret-down"></i>',
                    ],
                    //'mb_rpjmd_sasaran_id',
                    [
                        'attribute' => 'mb_rpjmd_sasaran_id',
                        'value' => function($model){
                            return 'Misi: <strong>'.$model->mbRpjmdTujuan->mbRpjmdMisi->mb_rpjmd_misi_isi.'</strong>';
                        },
                        'format' => 'raw',
                        'group'=>true,
                        'groupedRow'=>true,
                    ],
                    //'mbRpjmdTujuan.mbRpjmdMisi.mb_rpjmd_misi_isi',
                    //'mbRpjmdTujuan.mb_tujuan_isi',
                    [
                        'attribute' => 'mb_rpjmd_tujuan_id',
                        'value' => function($model){
                            return 'Misi: <strong>'.$model->mbRpjmdTujuan->mb_tujuan_isi.'</strong>';
                        },
                        'format' => 'raw',
                        'group'=>true,
                        'groupedRow'=>true,
                    ],
                    'mb_sasaran_isi:ntext',
                    'mb_sasaran_ket',
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