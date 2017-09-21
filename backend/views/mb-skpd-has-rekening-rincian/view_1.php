<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */

$this->title = $model->mb_skpd_has_rekening_rincian_penjabaran;
$this->params['breadcrumbs'][] = ['label' => 'Data Penyusunan Anggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-has-rekening-rincian-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_skpd_has_rekening_rincian_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_skpd_has_rekening_rincian_id], [
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
            'mb_skpd_has_rekening_rincian_id',
            'mb_skpd_has_rekening_rincian_ta',
            'mb_urusan_has_skpd_id',
            'mb_rekening_rincian_id',
            'mb_skpd_has_rekening_rincian_penjabaran:ntext',
            'mb_skpd_has_rekening_rincian_vol',
            'mb_skpd_has_rekening_rincian_satuan',
            'mb_skpd_has_rekening_rincian_harga',
            'mb_skpd_has_rekening_rincian_ket',
            'mb_skpd_has_rekening_rincian_created_at',
        ],
    ]) ?>

</div>
