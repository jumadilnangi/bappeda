<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritasNasionalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-prioritas-nasional-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_prioritas_nasional_id') ?>

    <?= $form->field($model, 'mb_prioritas_nasional_kode') ?>

    <?= $form->field($model, 'mb_prioritas_nasional_nama') ?>

    <?= $form->field($model, 'mb_prioritas_nasional_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
