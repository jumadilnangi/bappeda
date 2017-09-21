<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */

$this->title = $model->mb_uraian_pekerjaan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Uraian Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-uraian-pekerjaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_uraian_pekerjaan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_uraian_pekerjaan_id], [
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
            'mb_uraian_pekerjaan_id',
            'mb_renja_id',
            'mb_sumber_dana_id',
            'mb_uraian_pekerjaan_nama:ntext',
            'mb_uraian_pekerjaan_vol',
            'mb_uraian_pekerjaan_satuan',
            'mb_uraian_pekerjaan_harga_satuan',
            'mb_uraian_pekerjaan_pagu_tahun_maju',
        ],
    ]) ?>

</div>
