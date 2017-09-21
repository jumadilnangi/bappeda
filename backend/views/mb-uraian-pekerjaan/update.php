<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */

$this->title = 'Update Mb Uraian Pekerjaan: ' . $model->mb_uraian_pekerjaan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Uraian Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_uraian_pekerjaan_id, 'url' => ['view', 'id' => $model->mb_uraian_pekerjaan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-uraian-pekerjaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
