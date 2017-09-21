<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-skpd-has-rekening-rincian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_id') ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_ta') ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_id') ?>

    <?= $form->field($model, 'mb_rekening_rincian_id') ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_penjabaran') ?>

    <?php // echo $form->field($model, 'mb_skpd_has_rekening_rincian_vol') ?>

    <?php // echo $form->field($model, 'mb_skpd_has_rekening_rincian_satuan') ?>

    <?php // echo $form->field($model, 'mb_skpd_has_rekening_rincian_harga') ?>

    <?php // echo $form->field($model, 'mb_skpd_has_rekening_rincian_ket') ?>

    <?php // echo $form->field($model, 'mb_skpd_has_rekening_rincian_created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
