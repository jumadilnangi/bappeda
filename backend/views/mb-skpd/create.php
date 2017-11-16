<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */

$this->title = 'Tambah Data SKPD';
$this->params['breadcrumbs'][] = ['label' => 'Data SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);
?>
