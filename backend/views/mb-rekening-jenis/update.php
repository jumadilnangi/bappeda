<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningJenis */

$this->title = 'Update Mb Rekening Jenis: ' . $model->mb_rekening_jenis_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_jenis_id, 'url' => ['view', 'id' => $model->mb_rekening_jenis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-jenis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
