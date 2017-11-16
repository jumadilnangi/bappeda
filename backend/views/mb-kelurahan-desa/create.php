<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */

$this->title = 'Tambah Data Kelurahan / Desa';
$this->params['breadcrumbs'][] = ['label' => 'Data Kelurahan / Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
