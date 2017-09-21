<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRenjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Rencana Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-renja-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Rencana Kerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mb_renja_id',
            'mbTahunAnggaran.mb_tahun_anggaran_nama',
            'mb_kegiatan_id',
            'mbSasaran.mb_sasaran_nama',
            'mb_renja_indikator_kegiatan:ntext',
            // 'mb_renja_pagu_indikatif',
            // 'mb_renja_indikator_keg:ntext',
            // 'mb_renja_sasaran_keg:ntext',
            // 'mb_renja_hasil_prog_tolak_ukur',
            // 'mb_renja_hasil_prog_target_kerja',
            // 'mb_renja_keluaran_tolak_ukur',
            // 'mb_renja_keluaran_tolak_target_kerja',
            // 'mb_renja_hasil_kerja_tolak_ukur',
            // 'mb_renja_hasil_kerja_tolak_target_kerja',
            // 'mb_renja_target_capaian',
            // 'mb_renja_target_capaian_thn_maju',
            // 'mb_renja_ket:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
