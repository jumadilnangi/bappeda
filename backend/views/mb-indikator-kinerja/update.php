<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = 'Update Mb Indikator Kinerja: ' . $model->mb_indikator_kinerja_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Indikator Kinerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_indikator_kinerja_id, 'url' => ['view', 'id' => $model->mb_indikator_kinerja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-indikator-kinerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
