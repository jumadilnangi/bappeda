<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgramSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-program-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_program_id') ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_id') ?>

    <?= $form->field($model, 'mb_program_kode') ?>

    <?= $form->field($model, 'mb_program_nama') ?>

    <?= $form->field($model, 'mb_program_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
