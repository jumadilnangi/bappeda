<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */

$this->title = $model->mb_skpd_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_skpd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_skpd_id], [
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
            'mb_skpd_id',
            'mb_skpd_kode',
            'mb_skpd_nama',
            'mb_skpd_singkatan',
            'mb_skpd_ket',
        ],
    ]) ?>

</div>
