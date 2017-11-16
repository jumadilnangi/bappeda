<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusan */

$this->title = 'Update Data Urusan: ' . $model->mb_urusan_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Urusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';


echo $this->render('_form', [
	'model' => $model,
]);
?>
