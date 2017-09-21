<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */

$this->title = $model->mb_kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-kelurahan-desa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_kelurahan_desa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_kelurahan_desa_id], [
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
            'mb_kelurahan_desa_id',
            'mb_kecamatan_id',
            'mb_kelurahan_desa_kode',
            'mb_kelurahan_desa_nama',
        ],
    ]) ?>

</div>
