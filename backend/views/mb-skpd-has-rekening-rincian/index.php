<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSkpdHasRekeningRincianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penyusunan Anggaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-has-rekening-rincian-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::button('Penyusunan Anggaran', ['value' => Url::to('index.php?r=mb-skpd-has-rekening-rincian/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
     <?php 
        Modal::begin([
            'header' => '<h4>Penyusunan Anggaran</h4>',
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

            //'mb_skpd_has_rekening_rincian_id',
            'mb_skpd_has_rekening_rincian_ta',
            'mb_urusan_has_skpd_id',
           // 'mb_rekening_rincian_id',
            'mbRekeningRincian.mb_rekening_rincian_nama',
            'mb_skpd_has_rekening_rincian_penjabaran:ntext',
            // 'mb_skpd_has_rekening_rincian_vol',
            // 'mb_skpd_has_rekening_rincian_satuan',
            // 'mb_skpd_has_rekening_rincian_harga',
            // 'mb_skpd_has_rekening_rincian_ket',
            // 'mb_skpd_has_rekening_rincian_created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php    Pjax::end(); ?>
</div>
