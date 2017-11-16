<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;

use kartik\mpdf\Pdf;

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;


use backend\models\customs\Rkpd;
use backend\models\customs\Renja;

/**
* 
*/
class MbRkpdController extends Controller
{
	public function actionIndex()
	{
		$model = new Renja();
		if ($model->load(Yii::$app->request->post())) {
			self::Cari($model->mb_tahun_anggaran_id, $model->id_skpd);
		} else {
			return $this->render('index', [
				'model' => $model
			]);
		}
	}

	public function actionExport($ext, $ta, $id_skpd)
	{
		switch ($ext) {
			case 'xls':
				self::generateExcel($ta, $id_skpd);
				break;
			case 'pdf':
				self::generatePdf($ta, $id_skpd);
				break;
			default:
				# code...
				break;
		}
	}

	public function generateExcel($ta, $id_skpd)
	{
		//echo $ta;
		$objPHPExcel = \PHPExcel_IOFactory::load('template/tpl_rkpd.xlsx');

		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'TAHUN ANGGARAN '.$ta);

		//$jenisUrusan = Rkpd::getUrusanJenis($ta, $id_skpd);
		$jenisUrusan = Rkpd::urusanJenis($ta, $id_skpd);
		$awalBaris = 9;
		foreach ($jenisUrusan as $r => $jenis) {
			$row = $awalBaris + $r;
			$objPHPExcel->getActiveSheet()
				->insertNewRowBefore($row,1)
				->mergeCells('A'.$awalBaris.':H'.$awalBaris)
				//->setCellValue('A'.$row, $r+1)
				->setCellValue('A'.$row, $jenis['jenis_nama']);

			//$urusan = Rkpd::getUrusan($ta, $id_skpd, $jenis['id']);
			$urusan = Rkpd::Urusan($ta, $id_skpd, $jenis['mb_urusan_jenis_id']);
			foreach ($urusan as $r2 => $urus) {
				$row2 = $row+1;
				$objPHPExcel->getActiveSheet()
					->insertNewRowBefore($row2,1)
					->mergeCells('A'.$row2.':H'.$row2)
					->setCellValue('A'.$row2, $urus['urus_nama']);

				//$skpd = Rkpd::getSkpd($ta, $id_skpd,  $jenis['id'], $urus['id']);
				$skpd = Rkpd::Skpd($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
				foreach ($skpd as $opd) {
					$row3 = $row2+1;
					$objPHPExcel->getActiveSheet()
						->insertNewRowBefore($row3,1)
						->mergeCells('A'.$row3.':H'.$row3)
						->setCellValue('A'.$row3, $opd['skpd_nama']);

					//$program = Rkpd::getProgram($ta, $id_skpd,  $jenis['id'], $urus['id'], $opd['id']);
					$program = Rkpd::Program($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
					foreach ($program as $prog) {
						$row4 = $row3+1;
						$objPHPExcel->getActiveSheet()
							//->insertNewRowBefore($row4,1)
							->mergeCells('A'.$row4.':H'.$row4)
							->setCellValue('A'.$row4, $prog['prog_nama']);

						$kegiatan = Rkpd::Kegiatan($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id'], $prog['mb_program_id']);
						foreach ($kegiatan as $renj) {
							$row5 = $row4+1;
							//$totalHarga = $renj['vol'] * $renj['harga'];
							//$pagu = $pagu + $totalHarga;
							$objPHPExcel->getActiveSheet()
								//->insertNewRowBefore($row5,1)
								->setCellValue('A'.$row5, $renj['keg_kode'])
								->setCellValue('B'.$row5, $renj['mb_kegiatan_nama'])
								->setCellValue('C'.$row5, $renj['mb_renja_indikator_kegiatan'])
								->setCellValue('D'.$row5, $renj['mb_kabupaten_nama'])
								->setCellValue('E'.$row5, $renj['mb_renja_target_capaian'])
								->setCellValue('F'.$row5, number_format($renj['mb_renja_pagu_indikatif'],0,',','.'))
								->setCellValue('G'.$row5, $renj['mb_renja_target_capaian_thn_maju'])
								->setCellValue('H'.$row5, number_format($renj['mb_uraian_pekerjaan_pagu_tahun_maju'],0,',','.'));
						}
					}
				}
			}
			$temp_row = 4+$row;
		}
		//$objPHPExcel->getActiveSheet()->setCellValue('H'.$temp_row, date('d F Y'));
		$objPHPExcel->getActiveSheet()->removeRow($awalBaris-1,1);
		$filename = time().'.xlsx';

		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//$objWriter->save('php://output');
		$simpanTemp = $objWriter->save('tmp/'.$filename);
		return Yii::$app->getResponse()->sendFile('tmp/'.$filename,'rkapd-tahun_anggaran'.$ta.'.xlsx',['inline' => false]);
	}

	public function generatePdf($ta, $id_skpd)
	{
		$content = $this->renderPartial('_table', [
			'ta' => $ta,
			'id_skpd' => $id_skpd
		]);

		$pdf = new Pdf([
			//'mode' => Pdf::MODE_UTF8, 
			'format' => Pdf::FORMAT_FOLIO, 
			'orientation' => Pdf::ORIENT_LANDSCAPE,
			'destination' => Pdf::DEST_BROWSER, //Pdf::DEST_DOWNLOAD
			'content' => $content,
			'filename' => md5(time()).'.pdf',
			'options' => ['title' => 'Export RKPD'],
			'methods' => [ 
				//'SetHeader'=>['Krajee Report Header'],
				'SetFooter'=>['Halaman {PAGENO}'],
			]
		]);
		
		return $pdf->render(); 
	}

	public function Cari($ta, $id_skpd)
	{
		$tahunMaju = $ta + 1;
		//echo Html::a('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel', ['export', 'ext' => 'xls', 'ta' => $ta, 'id_skpd' => $id_skpd], ['class' => 'btn btn-success', 'target' => '_blank']).' '.
		echo Html::a('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export to PDF', ['export', 'ext' => 'pdf', 'ta' => $ta, 'id_skpd' => $id_skpd], ['class' => 'btn btn-danger', 'target' => '_blank']);
		echo Html::beginTag('table', ['class' => 'table table-striped table-bordered']);
			echo Html::beginTag('thead', ['class' => 'bg-yellow-gold bg-font-yellow-gold']);
				echo Html::beginTag('tr');
					echo Html::tag('th', 'Kode', ['rowspan' => '2', 'width' => '50px', 'style' => 'vertical-align: middle; text-align: center;']);
					echo Html::tag('th', 'Urusan/Bidang Urusan Pemerintahan Daerah Dan Program/Kegiatan', ['rowspan' => '2', 'width' => '250px', 'style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Indikator Kinerja Program/Kegiatan', ['rowspan' => '2', 'width' => '200px', 'style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Rencana Tahun '.$ta, ['colspan' => '3', 'style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Perkiraan Maju Rencana Tahun '.$tahunMaju, ['colspan' => '2', 'style' => 'vertical-align: middle; text-align: center']);
				echo Html::endTag('tr');
				echo Html::beginTag('tr');
					echo Html::tag('th', 'Lokasi', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Target Capaian Kinerja', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Kebutuhan Dana/Pagu Indikatif', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Target Capaian Kinerja', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', 'Pagu Maju (n + 1)', ['style' => 'vertical-align: middle; text-align: center']);
				echo Html::endTag('tr');
				echo Html::beginTag('tr');
					echo Html::tag('th', '1', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '2', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '3', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '4', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '5', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '6', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '7', ['style' => 'vertical-align: middle; text-align: center']);
					echo Html::tag('th', '8', ['style' => 'vertical-align: middle; text-align: center']);
				echo Html::endTag('tr');
			echo Html::endTag('thead');

			echo Html::beginTag('tbody');
				$jenisUrusan = Rkpd::urusanJenis($ta, $id_skpd);
				if ($jenisUrusan) {
					foreach ($jenisUrusan as $jenis) {
						echo Html::beginTag('tr');
							echo Html::tag('td', '<b>'.$jenis['jenis_nama'].'</b>', ['colspan' => '8']);
						echo Html::endTag('tr');

						$urusan = Rkpd::Urusan($ta, $id_skpd, $jenis['mb_urusan_jenis_id']);
						foreach ($urusan as $urus) {
							echo Html::beginTag('tr');
								echo Html::tag('td', '<b>'.$urus['urus_nama'].'</b>', ['colspan' => '8']);
							echo Html::endTag('tr');

							$skpd = Rkpd::Skpd($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
							foreach ($skpd as $opd) {
								echo Html::beginTag('tr');
									echo Html::tag('td', '<b>'.$opd['skpd_nama'].'</b>', ['colspan' => '8']);
								echo Html::endTag('tr');

								$program = Rkpd::Program($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id']);
								foreach ($program as $prog) {
									echo Html::beginTag('tr');
										echo Html::tag('td', '<b>'.$prog['prog_nama'].'</b>', ['colspan' => '8']);
									echo Html::endTag('tr');

									$kegiatan = Rkpd::Kegiatan($ta, $id_skpd, $jenis['mb_urusan_jenis_id'], $urus['mb_urusan_id'], $prog['mb_program_id']);
									foreach ($kegiatan as $renj) {
										$total = 0;
										$wil = '';
										$urais = 0;
										$uraian = Rkpd::uraianPekerjaan($renj['mb_renja_id']);
										foreach ($uraian as $value) {
											$total = $total + $value['mb_uraian_pekerjaan_vol'] * $value['mb_uraian_pekerjaan_harga_satuan'];
											$wil = $value['mb_kabupaten_nama'];
											$urais = $value['mb_uraian_pekerjaan_pagu_tahun_maju'];
										}

										echo Html::beginTag('tr');
											echo Html::tag('td', $renj['keg_kode']);
											echo Html::tag('td', $renj['mb_kegiatan_nama']);
											echo Html::tag('td', $renj['mb_renja_indikator_kegiatan']);
											echo Html::tag('td', $wil);
											echo Html::tag('td', $renj['mb_renja_target_capaian']);
											echo Html::tag('td', number_format($total,0,',','.'));
											echo Html::tag('td', $renj['mb_renja_target_capaian_thn_maju']);
											echo Html::tag('td', number_format($urais,0,',','.'));
										echo Html::endTag('tr');
									}
								}
							}
						}
					}
				} else {
					echo Html::beginTag('tr');
						echo Html::tag('td', 'Data tidak ada', ['colspan' => '8']);
					echo Html::endTag('tr');
				}
			echo Html::endTag('tbody');
		echo Html::endTag('table');
	}
}