<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbLokasiPekerjaan */

$this->title = $model->mb_lokasi_pekerjaan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Lokasi Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-lokasi-pekerjaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_lokasi_pekerjaan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_lokasi_pekerjaan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mb_lokasi_pekerjaan_id',
            'mb_uraian_pekerjaan_id',
            'mb_kelurahan_desa_id',
            'mb_lokasi_pekerjaan_latitudes',
            'mb_lokasi_pekerjaan_longitudes',
            'mb_lokasi_pekerjaan_rw',
            'mb_lokasi_pekerjaan_rt',
            'mb_lokasi_pekerjaan_ket',
        ],
    ]) ?>

</div>
