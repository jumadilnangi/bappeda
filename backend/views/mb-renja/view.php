<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */

$this->title = $model->mb_renja_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Renjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-renja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_renja_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_renja_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mb_renja_id',
            'mb_tahun_anggaran_id',
            'mb_kegiatan_id',
            'mb_sasaran_id',
            'mb_renja_indikator_kegiatan:ntext',
            'mb_renja_pagu_indikatif',
            'mb_renja_indikator_keg:ntext',
            'mb_renja_sasaran_keg:ntext',
            'mb_renja_hasil_prog_tolak_ukur',
            'mb_renja_hasil_prog_target_kerja',
            'mb_renja_keluaran_tolak_ukur',
            'mb_renja_keluaran_tolak_target_kerja',
            'mb_renja_hasil_kerja_tolak_ukur',
            'mb_renja_hasil_kerja_tolak_target_kerja',
            'mb_renja_target_capaian',
            'mb_renja_target_capaian_thn_maju',
            'mb_renja_ket:ntext',
        ],
    ]) ?>

</div>
