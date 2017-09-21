<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbLokasiPekerjaan */

$this->title = 'Update Lokasi Pekerjaan: ' . $model->mb_lokasi_pekerjaan_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Lokasi Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_lokasi_pekerjaan_id, 'url' => ['view', 'id' => $model->mb_lokasi_pekerjaan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-lokasi-pekerjaan-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
