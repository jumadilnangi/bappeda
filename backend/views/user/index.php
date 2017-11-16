<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use common\components\widgets\ToggleColumn;
use kartik\grid\GridView;
use kartik\grid\EditableColumn;

use backend\models\AuthAssignment;
use backend\models\MbSkpd;
use common\models\UserAkses;


$this->title = 'Manajemen User';
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
                //'filterModel' => $searchModel,
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout'=>true,
                    'options' => [
                        'id'=>'user_container',
                    ],
                ],
                'rowOptions' => function($temp){
                    if($temp->status == '0'){
                        return ['style' => 'background-color: #f56954;'];
                    } else {
                        //return ['class' => 'success'];
                        return [];
                    }
                },
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    //'id',
                    'username',
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    // 'email:email',
                    [
                        'attribute' => 'email',
                        'value' => 'email',
                        'format' => 'email',
                        'width' => '200px'
                    ],
                    //'skpd_id',
                    [
                        'attribute' => 'skpd_id',
                        'header' => 'SKPD',//'value' => 'idAkses.idSkpd.mb_skpd_nama'
                        'value' => function($model) {
                            return (empty($model->idAkses->skpd_id)) ? 'Semua SKPD' : $model->idAkses->idSkpd->mb_skpd_nama;
                        }
                        
                    ],
                    [
                        //'attribute' => 'role'
                        'header' => 'Role',
                        'value' => function($temp) {
                            $getRole = Yii::$app->authManager->getRolesByUser($temp->id);
                            if (is_array($getRole) && $getRole != NULL) {
                                return array_shift($getRole)->name;
                            }
                        },
                        'mergeHeader' => true,
                        'hAlign' => 'center',
                    ],
                    // 'created_at',
                    [
                        'attribute' => 'created_at',
                        //'label' => 'Create At'
                        'format' => ['date', 'php:Y-m-d h:s:d'],
                        'width' => '200px'
                    ],
                    // 'updated_at',
                    // [
                    //     'attribute' => 'updated_at',
                    //     'format' => ['date', 'php:Y-m-d h:s:d'],
                    //     'width' => '200px'
                    // ],
                    // 'created_by',
                    // 'updated_by',
                    [
                        'class' => ToggleColumn::className(),
                        'updateAction' => ['toggle-status'],
                        'attribute' => 'status',
                        'buttons' => [
                            '10' => 'Aktif',
                            '0' => 'Disable',
                        ],
                        'sizeButton' => 'btn-group-sm',
                        'filter' => Html::activeDropDownList(
                            $searchModel, 
                            'status', 
                            [
                                '0' => 'Disable', 
                                '10' => 'Aktif'
                            ],
                            [
                                'class'=>'form-control',
                                'prompt' => 'All'
                            ]
                        ),
                        'width' => '150px'
                    ],
                    /*[
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{update_skpd} {delete}',
                        //'template' => '{delete}',
                        'buttons' => [
                            //'update' => function($url, $model) {
                            //    $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                            //    return Html::a($icon, $url);
                            //},
                            //'update_skpd' => function($url, $model) {
                            //    $icon = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
                            //    $options = [
                            //        'title' => 'Edit SKPD',
                            //        'aria-label' => 'Edit SKPD',
                            //    ];
                            //    return Html::a($icon, $url, $options);
                            //},
                            'delete' => function($url, $model) {
                                $icon = '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                $idUser = Yii::$app->user->getId();

                                if ($idUser != $model->id) {
                                    return Html::a($icon, $url, [
                                        'title' => 'Hapus',
                                        'aria-label' => 'Hapus',
                                        'data-confirm' => 'Anda yakin menghapus data ini?',
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ]);
                                } else {
                                    return '<i class="fa fa-star text-yellow" aria-hidden="true"></i>';
                                }
                            },
                        ],
                    ],*/
                ],
                'layout' => '<div class="table-responsive">{items}</div>
                                    <div class="pull-left">{summary}</div>
                                    <div class="pull-right">{pager}</div>',
            ]); 
        ?>
    </div>
</div>
