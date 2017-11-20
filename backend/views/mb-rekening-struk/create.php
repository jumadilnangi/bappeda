<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStruk */

$this->title = 'Tambah Struk Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Struk Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
