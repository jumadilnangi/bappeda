<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Program';
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
                'filterModel' => $searchModel,
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout'=>true,
                    'options' => [
                        'id'=>'grid_container',
                    ],
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    // 'mb_program_id',
                    // 'mb_urusan_has_skpd_id',
                    // 'mb_program_kode',
                    [
                        'attribute' => 'mb_program_kode',
                        'label' => 'Kode',
                        'width' => '50px',
                        'hAlign' => 'center',
                    ],
                    'mb_program_nama',
                    [
                        'attribute' => 'mb_urusan_has_skpd_id',
                        'header' => 'Urusan dan SKPD',
                        'value' => function($model){
                            //return $model->mbUrusanHasSkpd->mbUrusan->mb_urusan_nama.' '.$model->mbUrusanHasSkpd->mbSkpd->mb_skpd_nama;
                            //return $model->mbUrusanHasSkpd->mbUrusan->mb_urusan_nama.' '.$model->mbUrusanHasSkpd->mb_skpd_id;
                            if ($model->mbUrusanHasSkpd->mb_skpd_id != NULL) {
                                return $model->mbUrusanHasSkpd->mbUrusan->mb_urusan_nama.' / '.$model->mbUrusanHasSkpd->mbSkpd->mb_skpd_nama;
                            } else {
                                return $model->mbUrusanHasSkpd->mbUrusan->mb_urusan_nama;
                            }
                        }
                    ],
                    'mb_program_ket',

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