<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */

$this->title = 'Update Obyek Rekening: ' . $model->mb_rekening_obyek_nama;
$this->params['breadcrumbs'][] = ['label' => 'Obyek Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
