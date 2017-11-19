<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningRincian */

$this->title = 'Update Rincian Rekening: ' . $model->mb_rekening_rincian_nama;
$this->params['breadcrumbs'][] = ['label' => 'Rincian Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);
?>
