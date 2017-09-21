<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRenjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-renja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_renja_id') ?>

    <?= $form->field($model, 'mb_tahun_anggaran_id') ?>

    <?= $form->field($model, 'mb_kegiatan_id') ?>

    <?= $form->field($model, 'mb_sasaran_id') ?>

    <?= $form->field($model, 'mb_renja_indikator_kegiatan') ?>

    <?php // echo $form->field($model, 'mb_renja_pagu_indikatif') ?>

    <?php // echo $form->field($model, 'mb_renja_indikator_keg') ?>

    <?php // echo $form->field($model, 'mb_renja_sasaran_keg') ?>

    <?php // echo $form->field($model, 'mb_renja_hasil_prog_tolak_ukur') ?>

    <?php // echo $form->field($model, 'mb_renja_hasil_prog_target_kerja') ?>

    <?php // echo $form->field($model, 'mb_renja_keluaran_tolak_ukur') ?>

    <?php // echo $form->field($model, 'mb_renja_keluaran_tolak_target_kerja') ?>

    <?php // echo $form->field($model, 'mb_renja_hasil_kerja_tolak_ukur') ?>

    <?php // echo $form->field($model, 'mb_renja_hasil_kerja_tolak_target_kerja') ?>

    <?php // echo $form->field($model, 'mb_renja_target_capaian') ?>

    <?php // echo $form->field($model, 'mb_renja_target_capaian_thn_maju') ?>

    <?php // echo $form->field($model, 'mb_renja_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
