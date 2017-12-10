<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisi */

$this->title = 'Update Visi';
$this->params['breadcrumbs'][] = ['label' => 'Data Visi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
