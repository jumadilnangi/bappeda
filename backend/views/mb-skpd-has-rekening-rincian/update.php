<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */

$this->title = 'Update Mb Skpd Has Rekening Rincian: ' . $model->mb_skpd_has_rekening_rincian_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Skpd Has Rekening Rincians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_skpd_has_rekening_rincian_id, 'url' => ['view', 'id' => $model->mb_skpd_has_rekening_rincian_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-skpd-has-rekening-rincian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
