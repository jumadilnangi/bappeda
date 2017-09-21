<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanJenis */

$this->title = $model->mb_urusan_jenis_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Urusan Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-jenis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_urusan_jenis_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_urusan_jenis_id], [
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
            'mb_urusan_jenis_id',
            'mb_urusan_jenis_kode',
            'mb_urusan_jenis_nama',
        ],
    ]) ?>

</div>
