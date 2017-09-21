<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanJenis */

$this->title = 'Update Mb Urusan Jenis: ' . $model->mb_urusan_jenis_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Urusan Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_urusan_jenis_id, 'url' => ['view', 'id' => $model->mb_urusan_jenis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-urusan-jenis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
