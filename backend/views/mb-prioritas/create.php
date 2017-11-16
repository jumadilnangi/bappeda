<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritas */

$this->title = 'Tambah Data Prioritas';
$this->params['breadcrumbs'][] = ['label' => 'Data Priorita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
