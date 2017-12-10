<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = 'Update Indikator Kinerja';
$this->params['breadcrumbs'][] = ['label' => 'Data Indikator Kinerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);
?>
