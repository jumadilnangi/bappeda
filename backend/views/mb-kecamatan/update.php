<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKecamatan */

$this->title = 'Update Data Kecamatan: ' . $model->mb_kecamatan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>

