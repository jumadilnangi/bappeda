<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisi */

$this->title = $model->mb_rpjmd_misi_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Misis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-misi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_rpjmd_misi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_rpjmd_misi_id], [
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
            'mb_rpjmd_misi_id',
            'mb_rpjmd_visi_id',
            'mb_rpjmd_misi_isi:ntext',
            'mb_rpjmd_misi_ket',
        ],
    ]) ?>

</div>
