<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbLokasiPekerjaan */

$this->title = 'Buat Lokasi Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Lokasi Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'id_uraian' => $id_uraian
]);
?>
