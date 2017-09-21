<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-indikator-kinerja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_indikator_kinerja_id') ?>

    <?= $form->field($model, 'mb_rpjmd_sasaran_id') ?>

    <?= $form->field($model, 'mb_indikator_kinerja_isi') ?>

    <?= $form->field($model, 'mb_indikator_kinerja_satuan') ?>

    <?= $form->field($model, 'mb_indikator_kinerja_awal') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_target_1') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_target_2') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_target_3') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_target_4') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_target_5') ?>

    <?php // echo $form->field($model, 'mb_indikator_kinerja_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
