<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritas */

$this->title = 'Update Data Prioritas: ' . $model->mb_prioritas_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Prioritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
