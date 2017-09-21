<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritas */

$this->title = $model->mb_prioritas_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Prioritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_prioritas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_prioritas_id], [
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
            'mb_prioritas_id',
            'mb_prioritas_nama',
            'mb_prioritas_no_urut',
            'mb_prioritas_ket',
        ],
    ]) ?>

</div>
