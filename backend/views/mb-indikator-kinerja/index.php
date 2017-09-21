<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbIndikatorKinerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Indikator Kinerjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-indikator-kinerja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Indikator Kinerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_indikator_kinerja_id',
            'mb_rpjmd_sasaran_id',
            'mb_indikator_kinerja_isi:ntext',
            'mb_indikator_kinerja_satuan',
            'mb_indikator_kinerja_awal',
            // 'mb_indikator_kinerja_target_1',
            // 'mb_indikator_kinerja_target_2',
            // 'mb_indikator_kinerja_target_3',
            // 'mb_indikator_kinerja_target_4',
            // 'mb_indikator_kinerja_target_5',
            // 'mb_indikator_kinerja_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
