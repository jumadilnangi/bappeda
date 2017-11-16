<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKecamatan */

$this->title = 'Tambah Data Kecamatan';
$this->params['breadcrumbs'][] = ['label' => 'Data Kecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
