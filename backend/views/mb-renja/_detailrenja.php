<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Detail Rencana Kerja</h3>
	</div>
	<div class="box-body">
		<?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            //'mb_renja_id',
	            // 'mb_tahun_anggaran_id',
	            'mbTahunAnggaran.mb_tahun_anggaran_nama',
	            // 'mb_kegiatan_id',
	            'mbKegiatan.mb_kegiatan_nama',
	            // 'mb_sasaran_id',
	            'mbSasaran.mb_sasaran_nama',
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
</div>