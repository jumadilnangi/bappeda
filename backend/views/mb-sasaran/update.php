<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSasaran */

$this->title = 'Update Sasaran: ' . $model->mb_sasaran_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Sasaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
