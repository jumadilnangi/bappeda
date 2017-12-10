<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = 'Tambah Indikator Kinerja';
$this->params['breadcrumbs'][] = ['label' => 'Data Indikator Kinerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'id_sasaran' => $id_sasaran
]);

?>
