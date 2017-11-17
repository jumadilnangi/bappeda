<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */

$this->title = 'Update Data Kelurahan / Desa: ' . $model->mb_kelurahan_desa_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kelurahan / Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
