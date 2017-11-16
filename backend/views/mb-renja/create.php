<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */

$this->title = 'Buat Renca Kerja (RENJA)';
$this->params['breadcrumbs'][] = ['label' => 'Data Rencana Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'modelUrusan' => $modelUrusan,
	'modelSkpd' => $modelSkpd,
	'modelProgram' => $modelProgram,
	'modelKegiatan' => $modelKegiatan,
	'modelPrioritas' => $modelPrioritas,
]) 

?>
