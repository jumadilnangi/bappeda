<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;

use backend\models\MbProgram;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbKegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kegiatan';
$this->params['breadcrumbs'][] = $this->title;

$js = <<< JS
    $(".btn-fresh").click(function(){
        $.pjax.reload({container:'#user_container'});
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
                        'id'=>'user_container',
                    ],
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    //'mb_kegiatan_id',
                    //'mb_kegiatan_kode',
                    [
                        'attribute' => 'mb_kegiatan_kode',
                        'label' => 'Kode',
                        'width' => '50px',
                        'hAlign' => 'center',
                    ],
                    'mb_kegiatan_nama',
                    //'mb_kegiatan_ket',
                    //'mb_program_id',
                    [
                        'attribute' => 'mb_program_id',
                        'value' => 'mbProgram.mb_program_nama',
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter'=> ArrayHelper::map(
                            MbProgram::find()
                                ->select('mb_program_id, mb_program_nama')
                                ->asArray()
                                ->all(),
                            'mb_program_id',
                            'mb_program_nama'
                        ),
                        'filterWidgetOptions' => [
                            'theme' => 'bootstrap',
                            'pluginOptions' => [
                                'allowClear'=>true,
                            ],
                        ],
                        'filterInputOptions' => ['placeholder'=>'Program..'],
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
