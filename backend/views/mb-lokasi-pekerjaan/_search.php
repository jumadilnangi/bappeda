<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbLokasiPekerjaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-lokasi-pekerjaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_id') ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_id') ?>

    <?= $form->field($model, 'mb_kelurahan_desa_id') ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_latitudes') ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_longitudes') ?>

    <?php // echo $form->field($model, 'mb_lokasi_pekerjaan_rw') ?>

    <?php // echo $form->field($model, 'mb_lokasi_pekerjaan_rt') ?>

    <?php // echo $form->field($model, 'mb_lokasi_pekerjaan_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
