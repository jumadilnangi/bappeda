<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningJenis */

$this->title = 'Tambah Jenis Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Rekening Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
