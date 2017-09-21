<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSkpdHasRekeningRincianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penyusunan Anggaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-has-rekening-rincian-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Penyusunan Anggaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
</div>
