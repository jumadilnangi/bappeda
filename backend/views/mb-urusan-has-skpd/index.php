<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbUrusanHasSkpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Urusan dan SKPD';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-has-skpd-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Urusan dan SKPD', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_urusan_has_skpd_id',
            [
              'attribute'=>'mb_urusan_id',
              'value'=>'mbUrusan.mb_urusan_nama',  
            ],
            //'mb_urusan_id',
           // 'mb_skpd_id',
            
            [
              'attribute'=>'mb_skpd_id',
              'value'=>'mbSkpd.mb_skpd_nama',  
            ],
            
            //'mb_urusan_has_skpd_mulai',
            //'mb_urusan_has_skpd_akhir',
            // 'mb_urusan_has_skpd_sk',
            // 'mb_urusan_has_skpd_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
