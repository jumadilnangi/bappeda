<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Detail Uraian Pekerjaan</h3>
		<div class="box-tools pull-right">
			<?= Html::a('<i class="fa fa-map-marker" aria-hidden="true"></i> Tambah Lokasi pekerjaan', ['/mb-lokasi-pekerjaan/create'], ['class' => 'btn btn-warning btn-sm']) ?>
		</div>
	</div>
	<div class="box-body">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				//'mb_uraian_pekerjaan_id',
				// 'mb_renja_id',
				[
					'attribute' => 'mbRenja.mbKegiatan.mb_kegiatan_nama',
					'label' => 'Kegiatan',
					//'value' => 'mbRenja.mbKegiatan.mb_kegiatan_nama'
				],
				// 'mb_sumber_dana_id',
				[
					'attribute' => 'mbSumberDana.mb_sumber_dana_nama',
				],
				'mb_uraian_pekerjaan_nama:ntext',
				'mb_uraian_pekerjaan_vol',
				'mb_uraian_pekerjaan_satuan',
				// 'mb_uraian_pekerjaan_harga_satuan',
				[
					'attribute' => 'mb_uraian_pekerjaan_harga_satuan',
					'value' => function($model) {
						return 'Rp. '.number_format($model->mb_uraian_pekerjaan_harga_satuan,0,',','.');
					}
				],
				// 'mb_uraian_pekerjaan_pagu_tahun_maju',
				[
					'attribute' => 'mb_uraian_pekerjaan_pagu_tahun_maju',
					'value' => function($model) {
						return 'Rp. '.number_format($model->mb_uraian_pekerjaan_pagu_tahun_maju,0,',','.');
					}
				],
				// lokasi
				[
					//'attribute' => 'mbLokasiPekerjaan.mbKelurahanDesa.mb_kelurahan_desa_nama',
					'label' => 'Lokasi Kegiatan',
					'value' => function($model) {
						//return $model->mbLokasiPekerjaan->mbKelurahanDesa.mb_kelurahan_desa_nama;
						$ul = '<ul>';
						foreach ($model->mbLokasiPekerjaans as $key => $value) {
							$ul .= '<li>'.$value->mbKelurahanDesa->mb_kelurahan_desa_nama.'</li>';
							//echo "<pre>";
							//print_r($value->mbKelurahanDesa->mb_kelurahan_desa_nama);
							//echo "</pre>";
						}
						$ul .= '</ul>';
						return $ul;
					},
					'format' => 'raw'
				],
				[
					'attribute' => 'mbUraianPekerjaanHasStatus.mbUraianStatus.mb_uraian_status_nama',
					'label' => 'Status'
				]
			],
		]) ?>
	</div>
</div>