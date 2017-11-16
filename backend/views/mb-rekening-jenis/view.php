<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningJenis */

$this->title = $model->mb_rekening_jenis_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenis Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-jenis-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_rekening_jenis_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_rekening_jenis_id], [
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
            'mb_rekening_jenis_id',
            'mbRekeningKelompok.mb_rekening_kelompok_nama',
            'mb_rekening_jenis_kode',
            'mb_rekening_jenis_nama',
            'mb_rekening_jenis_ket',
        ],
    ]) ?>

</div>
