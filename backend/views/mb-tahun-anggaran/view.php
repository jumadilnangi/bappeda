<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaran */

$this->title = $model->mb_tahun_anggaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Tahun Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-tahun-anggaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_tahun_anggaran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_tahun_anggaran_id], [
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
            'mb_tahun_anggaran_id',
            'mb_tahun_anggaran_nama',
            'mb_tahun_anggaran_ket',
        ],
    ]) ?>

</div>
