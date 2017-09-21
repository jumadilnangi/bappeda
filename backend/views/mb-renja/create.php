<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */

$this->title = 'Buat Renca Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Data Rencana Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-renja-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
