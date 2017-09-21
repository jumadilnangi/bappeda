<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */

$this->title = 'Update Mb Urusan Has Skpd: ' . $model->mb_urusan_has_skpd_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Urusan Has Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_urusan_has_skpd_id, 'url' => ['view', 'id' => $model->mb_urusan_has_skpd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-urusan-has-skpd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
