<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningRincian */

$this->title = 'Tambah Rincian Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Rincian Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
