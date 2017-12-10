<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tujuan</h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Tujuan', ['/mb-rpjmd-tujuan/create', 'id_misi' => $id], ['class' => 'btn btn-danger btn-sm']) ?>
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
                    // 'mb_rpjmd_tujuan_id',
                    //'mbRpjmdMisi.mbRpjmdVisi.mb_rpjmd_visi_isi',
                    //'mbRpjmdMisi.mb_rpjmd_misi_isi',
                    //'mb_tujuan_isi:ntext',
                    [
                        'attribute' => 'mb_tujuan_isi',
                        'format' => 'text'
                    ],
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
                                $url = Url::to(['/mb-rpjmd-tujuan/update', 'id' => $model->mb_rpjmd_tujuan_id]);
                                return Html::a($icon, $url);
                            },
                            'delete' => function($url, $model) {
                                $icon = '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                $url = Url::to(['/mb-rpjmd-tujuan/delete', 'id' => $model->mb_rpjmd_tujuan_id]);
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