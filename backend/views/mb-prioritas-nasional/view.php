<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritasNasional */

$this->title = $model->mb_prioritas_nasional_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Prioritas Nasional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-nasional-view">

   
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_prioritas_nasional_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_prioritas_nasional_id], [
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
            'mb_prioritas_nasional_id',
            'mb_prioritas_nasional_kode',
            'mb_prioritas_nasional_nama:ntext',
            'mb_prioritas_nasional_ket',
        ],
    ]) ?>

</div>
