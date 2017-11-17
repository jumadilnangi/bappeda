<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */

$this->title = 'Update Data Urusan dan SKPD';
$this->params['breadcrumbs'][] = ['label' => 'Data Urusan dan SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
	'model' => $model,
]);

?>
