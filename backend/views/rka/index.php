<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RkaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data RKA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rka-index" style="overflow-x: auto;">

   <p>
        <?= Html::a('Penyusunan Anggaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

            //'mb_skpd_has_rekening_rincian_id',
            'mb_skpd_has_rekening_rincian_ta',
           'kode_jenis_urusan',
           'nama_jenis_urusan',
            'kode_urusan',
         'nama_urusan',
             'kode_skpd',
            'nama_skpd',
         'kode_struk',
           'nama_struk',
            'kode_kelompok',
            'nama_kelompok',
          'kode_jenis',
           'nama_jenis',
            'kode_obyek',
             'nama_obyek',
            'kode_rincian',
             'nama_rincian',
            'penjabaran:ntext',
            'volume',
             'satuan',
             'harga',
            
            
            

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
