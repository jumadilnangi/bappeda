<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */

$this->title = 'Tambah Kelompok Rekening ';
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Kelompoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-kelompok-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
