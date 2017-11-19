<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritasNasional */

$this->title = 'Tambah Prioritas Nasional';
$this->params['breadcrumbs'][] = ['label' => 'Data Prioritas Nasional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-nasional-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
