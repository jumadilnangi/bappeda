<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */

$this->title = 'Tambah Rekening Kelompok';
$this->params['breadcrumbs'][] = ['label' => 'Rekening Kelompok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo  $this->render('_form', [
	'model' => $model,
]);

?>
