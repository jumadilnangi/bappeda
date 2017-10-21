<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningJenis */

$this->title = 'Tambah Jenis Rekening ';
$this->params['breadcrumbs'][] = ['label' => 'Data Jenis Rekening ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-jenis-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
