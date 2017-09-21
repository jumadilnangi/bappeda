<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = $model->mb_indikator_kinerja_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Indikator Kinerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-indikator-kinerja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_indikator_kinerja_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_indikator_kinerja_id], [
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
            'mb_indikator_kinerja_id',
            'mb_rpjmd_sasaran_id',
            'mb_indikator_kinerja_isi:ntext',
            'mb_indikator_kinerja_satuan',
            'mb_indikator_kinerja_awal',
            'mb_indikator_kinerja_target_1',
            'mb_indikator_kinerja_target_2',
            'mb_indikator_kinerja_target_3',
            'mb_indikator_kinerja_target_4',
            'mb_indikator_kinerja_target_5',
            'mb_indikator_kinerja_ket',
        ],
    ]) ?>

</div>
