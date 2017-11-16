<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\mbKabupatenKota;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbKecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kecamatan';
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

                    //'mb_kecamatan_id',
                    //'mb_kabupaten_kota_id',
                    // 'mb_kecamatan_kode',
                    [
                        'attribute' => 'mb_kecamatan_kode',
                        'label' => 'Kode',
                        'width' => '50px',
                        'hAlign' => 'center',
                    ],
                    'mb_kecamatan_nama',
                    [
                        'attribute'=>'mb_kabupaten_kota_id',
                        'value' => 'mbKabupatenKota.mb_kabupaten_nama',
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
