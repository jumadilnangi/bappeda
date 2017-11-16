<?php

?>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Detail Penyusunan Anggaran</h3>
	</div>
	<div class="box-body">
		<!--div class="row"-->
			<table class="table">
				<tbody>
					<tr>
						<th width="100px" style="text-align: right;">Tahun Anggaran:</th>
						<td><?= $model->mb_skpd_has_rekening_rincian_ta?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Nama SKPD:</th>
						<td><?= $model->mbUrusanHasSkpd->mbSkpd->mb_skpd_nama?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Rincian Rekening:</th>
						<td><?= $model->mbRekeningRincian->mb_rekening_rincian_nama?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Penjabaran Rekening:</th>
						<td><?= $model->mb_skpd_has_rekening_rincian_penjabaran?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Volume:</th>
						<td><?= $model->mb_skpd_has_rekening_rincian_vol?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Satuan:</th>
						<td><?= $model->mb_skpd_has_rekening_rincian_satuan?></td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Harga:</th>
						<td>Rp. <?= number_format($model->mb_skpd_has_rekening_rincian_harga,0,',','.')?>,-</td>
					</tr>
					<tr>
						<th width="100px" style="text-align: right;">Total Harga:</th>
						<td>Rp. <?= number_format($model->mb_skpd_has_rekening_rincian_vol * $model->mb_skpd_has_rekening_rincian_harga,0,',','.')?>,-</td>
					</tr>
				</tbody>
			</table>
		<!--/div-->
	</div>
</div>