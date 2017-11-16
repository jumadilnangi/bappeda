<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */

$this->title = 'Update Data Program: ' . $model->mb_program_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Program', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
