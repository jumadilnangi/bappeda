<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisi */

$this->title = 'Tambah Visi';
$this->params['breadcrumbs'][] = ['label' => 'Data Visi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
