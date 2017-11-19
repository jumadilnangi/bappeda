<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

use backend\models\MbRekeningJenis;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningObyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obyek Rekening';
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

                    //'mb_rekening_obyek_id',
                    // 'mb_rekening_jenis_id',
                    [
                        'attribute' => 'mb_rekening_jenis_id',
                        'value' => function($model){
                            return $model->mbRekeningJenis->mb_rekening_jenis_kode.' - '.$model->mbRekeningJenis->mb_rekening_jenis_nama;
                        },
                        'filterType' => GridView::FILTER_SELECT2,
                        'filter'=> ArrayHelper::map(
                            MbRekeningJenis::find()
                                ->select('mb_rekening_jenis_id, mb_rekening_jenis_nama')
                                ->asArray()
                                ->all(),
                            'mb_rekening_jenis_id', 
                            'mb_rekening_jenis_nama'
                        ),
                        'filterWidgetOptions' => [
                            'theme' => 'bootstrap',
                            'pluginOptions' => [
                                'allowClear'=>true,
                            ],
                        ],
                        'filterInputOptions' => ['placeholder'=>'Jenis Rekening..'],
                        'width' => '100px'
                    ],
                    // 'mb_rekening_obyek_kode',
                    [
                        'attribute' => 'mb_rekening_obyek_kode',
                        'label' => 'Kode',
                        'width' => '50px',
                        'hAlign' => 'center',
                    ],
                    'mb_rekening_obyek_nama',
                    'mb_rekening_obyek_ket',

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