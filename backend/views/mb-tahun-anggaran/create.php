<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaran */

$this->title = 'Tambah Tahun Anggaran';
$this->params['breadcrumbs'][] = ['label' => 'Tahun Anggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
