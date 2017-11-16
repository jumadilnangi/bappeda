<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSasaran */

$this->title = 'Tambah Data Sasaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Sasaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
