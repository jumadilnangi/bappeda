<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */

$this->title = 'Update Mb Rekening Kelompok: ' . $model->mb_rekening_kelompok_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Kelompoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_kelompok_id, 'url' => ['view', 'id' => $model->mb_rekening_kelompok_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-kelompok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
