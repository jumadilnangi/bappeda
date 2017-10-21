<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningRincianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Rincian Rekening';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-rincian-index" style="overflow-x: auto;">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Rincian Rekening', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_rekening_rincian_id',
           // 'mbRekeningObyek.mbRekeningJenis.mbRekeningKelompok.mbRekeningStruk.mb_rekening_struk_nama',
            //'mbRekeningObyek.mbRekeningJenis.mbRekeningKelompok.mb_rekening_kelompok_nama',
           
            
            //[
              //  'attribute'=>'Nama Jenis ', 
                //'value'=>'mbRekeningObyek.mbRekeningJenis.mb_rekening_jenis_nama',
            //],
            
            [
              'attribute'=>'mb_rekening_obyek_id', 
                'value'=>'mbRekeningObyek.mb_rekening_obyek_nama',
            ],
            
            'mb_rekening_rincian_kode',
            'mb_rekening_rincian_nama',
            //'mb_rekening_rincian_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
