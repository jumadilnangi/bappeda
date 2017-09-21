<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbUraianPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Uraian Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-uraian-pekerjaan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Uraian Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_uraian_pekerjaan_id',
            'mb_renja_id',
            'mb_sumber_dana_id',
            'mb_uraian_pekerjaan_nama:ntext',
            'mb_uraian_pekerjaan_vol',
            // 'mb_uraian_pekerjaan_satuan',
            // 'mb_uraian_pekerjaan_harga_satuan',
            // 'mb_uraian_pekerjaan_pagu_tahun_maju',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
