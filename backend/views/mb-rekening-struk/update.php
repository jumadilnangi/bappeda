<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStruk */

$this->title = 'Update Struk Rekening : ' . $model->mb_rekening_struk_nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Struk Rekening ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_struk_id, 'url' => ['view', 'id' => $model->mb_rekening_struk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-struk-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
