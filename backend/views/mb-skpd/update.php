<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */

$this->title = 'Update Data SKPD: ' . $model->mb_skpd_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);
?>
