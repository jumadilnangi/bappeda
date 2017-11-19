<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */

$this->title = $model->mb_rekening_obyek_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Obyek Rekening ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-obyek-view">

 

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mb_rekening_obyek_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mb_rekening_obyek_id], [
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
            'mb_rekening_obyek_id',
            'mbRekeningJenis.mbRekeningKelompok.mb_rekening_kelompok_nama',
            'mbRekeningJenis.mb_rekening_jenis_nama',
            'mb_rekening_obyek_kode',
            'mb_rekening_obyek_nama',
            //'mb_rekening_obyek_ket',
        ],
    ]) ?>

</div>
