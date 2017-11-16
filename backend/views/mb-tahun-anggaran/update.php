<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaran */

$this->title = 'Update Tahun Anggaran: ' . $model->mb_tahun_anggaran_nama;
$this->params['breadcrumbs'][] = ['label' => 'Tahun Anggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
