<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */

$this->title = 'Tambah Data Urusan dan SKPD';
$this->params['breadcrumbs'][] = ['label' => 'Data Urusan dan SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
	'model' => $model,
]);

?>
