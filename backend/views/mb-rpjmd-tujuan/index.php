<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Tujuan';
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
                        'detailUrl' => Url::to(['detailsasaran']),
                        'expandOneOnly' => true,
                        'expandIcon' => '<i class="fa fa-caret-right"></i>',
                        'collapseIcon' => '<i class="fa fa-caret-down"></i>',
                    ],
                    // 'mb_rpjmd_tujuan_id',
                    [
                        //'attribute' => 'mbRpjmdMisi.mbRpjmdVisi.mb_rpjmd_visi_isi',
                        'attribute' => 'mb_rpjmd_tujuan_id',
                        'label' => 'Visi',
                        'value' => function($model){
                            return 'Visi: <strong>'.$model->mbRpjmdMisi->mbRpjmdVisi->mb_rpjmd_visi_isi.'</strong>';
                        },
                        'format' => 'raw',
                        'group'=>true,
                        'groupedRow'=>true,
                    ],
                    [
                        //'attribute' => 'mbRpjmdMisi.mb_rpjmd_misi_isi',
                        'attribute' => 'mb_rpjmd_misi_id',
                        'label' => 'Misi',
                        'value' => function($model){
                            return 'Misi: <strong>'.$model->mbRpjmdMisi->mb_rpjmd_misi_isi.'</strong>';
                        },
                        'format' => 'raw',
                        'group'=>true,
                        'groupedRow'=>true,  
                    ],
                    'mb_tujuan_isi:ntext',
                    // 'mb_tujuan_ket',
                    [
                        'attribute' => 'mb_tujuan_ket',
                        'label' => 'Keterangan'
                    ],
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