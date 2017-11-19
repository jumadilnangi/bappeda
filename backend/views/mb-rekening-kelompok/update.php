<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */

$this->title = 'Update Rekening Kelompok: ' . $model->mb_rekening_kelompok_nama;
$this->params['breadcrumbs'][] = ['label' => 'Rekening Kelompok', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo  $this->render('_form', [
	'model' => $model,
]);

?>
