<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Sasaran</h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Tujuan', ['/mb-rpjmd-sasaran/create', 'id_tujuan' => $id], ['class' => 'btn btn-danger btn-sm']) ?>
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
                        'id'=>'grids_container',
                    ],
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    //'mb_rpjmd_sasaran_id',
                    'mb_sasaran_isi:ntext',
                    'mb_sasaran_ket',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function($url, $model) {
                                $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                                $url = Url::to(['/mb-rpjmd-sasaran/update', 'id' => $model->mb_rpjmd_sasaran_id]);
                                return Html::a($icon, $url);
                            },
                            'delete' => function($url, $model) {
                                $icon = '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                $url = Url::to(['/mb-rpjmd-sasaran/delete', 'id' => $model->mb_rpjmd_sasaran_id]);
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