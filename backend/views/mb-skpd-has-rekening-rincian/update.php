<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */

//$this->title = 'Edit Rincian Rekening: ' . $model->mb_skpd_has_rekening_rincian_id;
$this->title = 'Edit Rincian Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Data Penyusunan Anggaran', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->mb_skpd_has_rekening_rincian_id, 'url' => ['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
	'modelStruk' => $modelStruk,
	'modelUrusan' => $modelUrusan,
	'modelKelompok' => $modelKelompok,
	'modelJenis' => $modelJenis,
	'modelObyek' => $modelObyek,
	'modelRinci' => $modelRinci
]); 
?>
