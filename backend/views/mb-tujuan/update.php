<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTujuan */

$this->title = 'Update Mb Tujuan: ' . $model->mb_tujuan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_tujuan_id, 'url' => ['view', 'id' => $model->mb_tujuan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-tujuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
