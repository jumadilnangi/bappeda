<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningRincian */

$this->title = 'Update Mb Rekening Rincian: ' . $model->mb_rekening_rincian_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Rincians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_rincian_id, 'url' => ['view', 'id' => $model->mb_rekening_rincian_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-rincian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
