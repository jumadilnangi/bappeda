<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningJenis */

$this->title = 'Update Jenis Rekening: ' . $model->mb_rekening_jenis_nama;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);
?>
