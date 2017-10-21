<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = 'Tambah Indikator Kinerja';
$this->params['breadcrumbs'][] = ['label' => 'Data Indikator Kinerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-indikator-kinerja-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
