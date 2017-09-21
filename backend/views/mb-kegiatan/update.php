<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */

$this->title = 'Update Mb Kegiatan: ' . $model->mb_kegiatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_kegiatan_id, 'url' => ['view', 'id' => $model->mb_kegiatan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-kegiatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
