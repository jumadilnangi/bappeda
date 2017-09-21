<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */

$this->title = 'Ubah Rencana Kerja: ' . $model->mb_renja_id;
$this->params['breadcrumbs'][] = ['label' => 'Data Rencana Kerja ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_renja_id, 'url' => ['view', 'id' => $model->mb_renja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-renja-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
