<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritas */

$this->title = 'Update Mb Prioritas: ' . $model->mb_prioritas_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Prioritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_prioritas_id, 'url' => ['view', 'id' => $model->mb_prioritas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-prioritas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
