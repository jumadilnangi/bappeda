<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */

$this->title = 'Tambah Program';
$this->params['breadcrumbs'][] = ['label' => 'Data Program', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
