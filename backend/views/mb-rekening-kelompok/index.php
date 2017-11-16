<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningKelompokSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kelompok Rekening ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-kelompok-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Kelompok Rekening', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rekening_kelompok_id',
            'mb_rekening_struk_id',
            'mb_rekening_kelompok_kode',
            'mb_rekening_kelompok_nama',
            'mb_rekening_kelompok_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
