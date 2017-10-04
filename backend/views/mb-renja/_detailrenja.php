<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\grid\GridView;

use backend\models\customs\SumberDana;
//use backend\models\customs\

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
				//'mb_renja_pagu_indikatif',
				[
					'attribute' => 'mb_renja_pagu_indikatif',
					'value' => function($model) {
						$satuan = 0;
						$harga = 0;
						foreach ($model->mbUraianPekerjaans as $key => $value) {
							$satuan = $satuan + $value->mb_uraian_pekerjaan_vol;
							$harga = $harga + $value->mb_uraian_pekerjaan_harga_satuan;
						}
						return 'Rp. '.number_format($satuan*$harga,0,',','.');
					}
				],
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
		<hr>
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Uraian Pekerjaan</h3>
				<div class="box-tools pull-right">
					<?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah uraian pekerjaan', ['/mb-uraian-pekerjaan/create', 'id_renja' => $model->mb_renja_id], ['class' => 'btn btn-danger btn-sm']) ?>
				</div>
			</div>
			<div class="box-body">
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'pjax' => true,
					'pjaxSettings' => [
						'neverTimeout'=>true,
						'options' => [
							'id'=>'grid_container',
						],
					],
					'columns' => [
						[
							'class' => 'kartik\grid\SerialColumn',
							'width' => '50px'
						],
						//'mb_uraian_pekerjaan_id',
						//'mb_renja_id',
						// 'mb_sumber_dana_id',
						[
							'header' => 'Status',
							'value' => 'mbUraianPekerjaanHasStatus.mbUraianStatus.mb_uraian_status_nama',
							'width' => '80px'
						],
						[
							'header' => 'Sumber Dana',
							//'attribute' => 'mb_sumber_dana_id',
							'value' => 'mbSumberDana.mb_sumber_dana_nama',
							'width' => '50px',
						],
						// 'mb_uraian_pekerjaan_nama:ntext',
						[
							'header' => 'Uraian Pekerjaan',
							'value' => 'mb_uraian_pekerjaan_nama',
						],
						// 'mb_uraian_pekerjaan_vol',
						[
							'header' => 'Volume',
							'value' => 'mb_uraian_pekerjaan_vol',
							'width' => '50px',
							'hAlign' => 'center'
						],
						// 'mb_uraian_pekerjaan_satuan',
						[
							'header' => 'Satuan',
							'value' => 'mb_uraian_pekerjaan_satuan',
							'width' => '50px',
							'hAlign' => 'center'
						],
						// 'mb_uraian_pekerjaan_harga_satuan',
						[
							'header' => 'Harga Satuan',
							'value' => function($model) {
								return 'Rp. '.number_format($model->mb_uraian_pekerjaan_harga_satuan,0,',','.');
							},
							'width' => '100px',
							'hAlign' => 'right'
						],
						[
							'header' => 'Jumlah Harga',
							'value' => function($model) {
								//return $model->mb_uraian_pekerjaan_vol*$model->mb_uraian_pekerjaan_harga_satuan
								return 'Rp. '.number_format($model->mb_uraian_pekerjaan_vol*$model->mb_uraian_pekerjaan_harga_satuan,0,',','.');
							},
							'width' => '100px',
							'hAlign' => 'right'
						],
						// 'mb_uraian_pekerjaan_pagu_tahun_maju',
						[
							'header' => 'Pagu Tahun Maju',
							'value' => function($model) {
								return 'Rp. '.number_format($model->mb_uraian_pekerjaan_pagu_tahun_maju,0,',','.');
							},
							'width' => '100px',
							'hAlign' => 'right'
						],
						[
							'header' => 'Lokasi',
							'value' => function($model) {
								/*$queryLokasi = Yii::$app->db->createCommand("SELECT CONCAT('Desa/Kelurahan ', kel.mb_kelurahan_desa_nama, ', Kecamatan ', kec.mb_kecamatan_nama, ', Kabupaten/Kota ', kab.mb_kabupaten_nama, ' Propinsi ',prov.mb_provinsi_nama) AS lokasi
										FROM mb_lokasi_pekerjaan AS lok
										JOIN mb_kelurahan_desa AS kel USING(mb_kelurahan_desa_id)
										JOIN mb_kecamatan AS kec USING(mb_kecamatan_id)
										JOIN mb_kabupaten_kota AS kab USING(mb_kabupaten_kota_id)
										JOIN mb_provinsi AS prov USING(mb_provinsi_id)
										WHERE lok.mb_uraian_pekerjaan_id = ".$model->mb_uraian_pekerjaan_id)
									->queryOne();
								return Html::a($model->mbLokasiPekerjaan->mbKelurahanDesa->mb_kelurahan_desa_nama,
									'javascript:void()', ['data-toggle' => 'tooltip', 
									'data-placement' => 'bottom', 
									'title' => $queryLokasi['lokasi']
								]);*/
								$ul = '<ul>';
								foreach ($model->mbLokasiPekerjaans as $key => $value) {
									$ul .= '<li>'.$value->mbKelurahanDesa->mb_kelurahan_desa_nama.'</li>';
								}
								$ul .= '</ul>';
								return $ul;
							},
							'format' => 'raw',
							'width' => '150px'
						],
						//['class' => 'yii\grid\ActionColumn'],
					],
				]); ?>
			</div>
		</div>
		
	</div>
</div>