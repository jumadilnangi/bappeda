<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-uraian-pekerjaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_id') ?>

    <?= $form->field($model, 'mb_renja_id') ?>

    <?= $form->field($model, 'mb_sumber_dana_id') ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_nama') ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_vol') ?>

    <?php // echo $form->field($model, 'mb_uraian_pekerjaan_satuan') ?>

    <?php // echo $form->field($model, 'mb_uraian_pekerjaan_harga_satuan') ?>

    <?php // echo $form->field($model, 'mb_uraian_pekerjaan_pagu_tahun_maju') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
