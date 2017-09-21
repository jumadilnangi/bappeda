<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbKelurahanDesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Desa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-kelurahan-desa-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Desa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            

            //'mb_kelurahan_desa_id',
            //'mb_kecamatan_id',
            'mb_kelurahan_desa_kode',
            'mb_kelurahan_desa_nama',
            [
                'attribute'=>'mb_kecamatan_id',
                'value'=>'mbKecamatan.mb_kecamatan_nama',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
