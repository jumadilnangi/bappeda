<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */

$this->title = 'Tambah Sasaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Sasaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
	'id_tujuan' => $id_tujuan
]);

?>
