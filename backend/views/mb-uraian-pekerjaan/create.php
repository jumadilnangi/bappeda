<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */

$this->title = 'Buat Uraian Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Uraian Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'modelStatus' => $modelStatus,
	'modelLokasi' => $modelLokasi
]);
?>
