<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */

$this->title = 'Update Mb Kelurahan Desa: ' . $model->mb_kelurahan_desa_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_kelurahan_desa_id, 'url' => ['view', 'id' => $model->mb_kelurahan_desa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-kelurahan-desa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
