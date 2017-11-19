<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritasNasional */

$this->title = 'Update Mb Prioritas Nasional: ' . $model->mb_prioritas_nasional_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Prioritas Nasionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_prioritas_nasional_id, 'url' => ['view', 'id' => $model->mb_prioritas_nasional_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-prioritas-nasional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
