<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdTujuan */

$this->title = 'Tambah Tujuan';
$this->params['breadcrumbs'][] = ['label' => 'Data Tujuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'id_misi' => $id_misi
]);

?>
