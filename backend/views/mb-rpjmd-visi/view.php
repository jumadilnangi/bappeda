<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisi */

$this->title = $model->mb_rpjmd_visi_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Visis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-visi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_rpjmd_visi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_rpjmd_visi_id], [
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
            'mb_rpjmd_visi_id',
            'mb_rpjmd_visi_isi:ntext',
            'mb_rpjmd_visi_awal',
            'mb_rpjmd_visi_akhir',
            'mb_rpjmd_visi_ket',
        ],
    ]) ?>

</div>
