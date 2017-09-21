<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */

$this->title = $model->mb_program_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_program_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_program_id], [
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
            'mb_program_id',
            'mb_urusan_has_skpd_id',
            'mb_program_kode',
            'mb_program_nama',
            'mb_program_ket',
        ],
    ]) ?>

</div>
