<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStruk */

$this->title = 'Update Struk Rekening: ' . $model->mb_rekening_struk_nama;
$this->params['breadcrumbs'][] = ['label' => 'Struk Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);
?>
