<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */

$this->title = 'Tambah Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Data Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-kegiatan-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
