<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */

$this->title = 'Update Uraian Pekerjaan: ' . $model->mb_uraian_pekerjaan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Uraian Pekerjaan', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->mb_uraian_pekerjaan_nama, 'url' => ['view', 'id' => $model->mb_uraian_pekerjaan_id]];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
	'modelStatus' => $modelStatus,
	'modelLokasi' => $modelLokasi,
	'id_renja' => $id_renja
]);
?>
