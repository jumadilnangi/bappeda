<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */

$this->title = $model->mb_urusan_has_skpd_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Urusan dan SKPD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-has-skpd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_urusan_has_skpd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_urusan_has_skpd_id], [
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
            'mb_urusan_has_skpd_id',
            'mbUrusan.mb_urusan_nama',
            'mbSkpd.mb_skpd_nama',
            'mb_urusan_has_skpd_mulai',
            'mb_urusan_has_skpd_akhir',
            'mb_urusan_has_skpd_sk',
            'mb_urusan_has_skpd_ket',
        ],
    ]) ?>

</div>
