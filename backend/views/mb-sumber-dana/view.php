<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSumberDana */

$this->title = $model->mb_sumber_dana_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Sumber Dana', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-sumber-dana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_sumber_dana_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_sumber_dana_id], [
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
            'mb_sumber_dana_id',
            'mb_sumber_dana_nama',
        ],
    ]) ?>

</div>
