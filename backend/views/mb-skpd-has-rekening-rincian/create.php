<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */

$this->title = 'Tambah Rincian Anggaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Penyusunan Anggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
