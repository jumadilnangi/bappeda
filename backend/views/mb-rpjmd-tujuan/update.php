<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdTujuan */

$this->title = 'Update Tujuan';
$this->params['breadcrumbs'][] = ['label' => 'Data Tujuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
