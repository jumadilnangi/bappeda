<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaran */

$this->title = 'Update Mb Tahun Anggaran: ' . $model->mb_tahun_anggaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Tahun Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_tahun_anggaran_id, 'url' => ['view', 'id' => $model->mb_tahun_anggaran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-tahun-anggaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
