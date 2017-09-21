<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbLokasiPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Lokasi Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-lokasi-pekerjaan-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Lokasi Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_lokasi_pekerjaan_id',
            'mb_uraian_pekerjaan_id',
            'mb_kelurahan_desa_id',
            'mb_lokasi_pekerjaan_latitudes',
            'mb_lokasi_pekerjaan_longitudes',
            // 'mb_lokasi_pekerjaan_rw',
            // 'mb_lokasi_pekerjaan_rt',
            // 'mb_lokasi_pekerjaan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
