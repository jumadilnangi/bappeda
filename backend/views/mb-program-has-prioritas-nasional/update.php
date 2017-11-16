<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgramHasPrioritasNasional */

$this->title = 'Update Sinkronisasi Prioritas Nasional: ' . $model->mb_program_has_prioritas_nasional_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Sinkronisasi Program Prioritas Nasional', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_program_has_prioritas_nasional_id, 'url' => ['view', 'id' => $model->mb_program_has_prioritas_nasional_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-program-has-prioritas-nasional-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
