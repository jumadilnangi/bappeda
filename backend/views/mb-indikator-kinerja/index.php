<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbIndikatorKinerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Indikator Kinerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-indikator-kinerja-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <p>
        <?= Html::button('+ Indikator Kinerja', ['value' => Url::to(['create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
     <?php 
        Modal::begin([
            'header' => '<h4>Form Isian Indikator Kinerja</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
            'options' => [
            'tabindex' => false
            ],
        ]);
        echo "<div id='modalContent'> </div>";
        Modal::end();
    ?>
    
    <?php    Pjax::begin(); ?>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_indikator_kinerja_id',
            'mbRpjmdSasaran.mb_sasaran_isi',
            'mb_indikator_kinerja_isi:ntext',
            'mb_indikator_kinerja_satuan',
            'mb_indikator_kinerja_awal',
            'mb_indikator_kinerja_target_1',
             'mb_indikator_kinerja_target_2',
            'mb_indikator_kinerja_target_3',
            'mb_indikator_kinerja_target_4',
            'mb_indikator_kinerja_target_5',
            // 'mb_indikator_kinerja_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
           <?php    Pjax::end(); ?>
</div>
