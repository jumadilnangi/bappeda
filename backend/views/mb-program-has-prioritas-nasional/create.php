<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbProgramHasPrioritasNasional */

$this->title = 'Tambah Sinkronisasi Prioritas Nasional';
$this->params['breadcrumbs'][] = ['label' => 'Data Sinkornisasi Prioritas Nasional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-has-prioritas-nasional-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
