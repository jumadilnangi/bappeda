<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */

$this->title = 'Update Data Kegiatan: ' . $model->mb_kegiatan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
	'modelSkpd' => $modelSkpd
]);
?>
