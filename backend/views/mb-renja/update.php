<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */

$this->title = 'Ubah Rencana Kerja: ' . $model->mbKegiatan->mb_kegiatan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Rencana Kerja ', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->mbKegiatan->mb_kegiatan_nama, 'url' => ['view', 'id' => $model->mb_renja_id]];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
	//'modelStatus' => $modelStatus,
	//'modelLokasi' => $modelLokasi,

	'modelUrusan' => $modelUrusan,
	'modelSkpd' => $modelSkpd,
	'modelProgram' => $modelProgram,
	'modelKegiatan' => $modelKegiatan,
	'modelPrioritas' => $modelPrioritas,
]);
?>
