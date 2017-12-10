<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisi */

$this->title = 'Update Misi';
$this->params['breadcrumbs'][] = ['label' => 'Data Misi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
