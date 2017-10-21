<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbUrusanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Urusan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Urusan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mb_urusan_id',
            //'mb_urusan_jenis_id',
            
            'mb_urusan_kode',
            'mb_urusan_nama',
            [
                'attribute' => 'mb_urusan_jenis_id',
                'value' => 'mbUrusanJenis.mb_urusan_jenis_nama',
            ],
            
           // 'mb_urusan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
