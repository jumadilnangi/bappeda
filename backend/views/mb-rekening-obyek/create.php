<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */

$this->title = 'Tambah Obyek Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Obyek Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
