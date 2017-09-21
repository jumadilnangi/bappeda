<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RkaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rka-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_id') ?>

    <?= $form->field($model, 'kode_jenis_urusan') ?>

    <?= $form->field($model, 'nama_jenis_urusan') ?>

    <?= $form->field($model, 'kode_urusan') ?>

    <?= $form->field($model, 'nama_urusan') ?>

    <?php // echo $form->field($model, 'kode_skpd') ?>

    <?php // echo $form->field($model, 'nama_skpd') ?>

    <?php // echo $form->field($model, 'kode_struk') ?>

    <?php // echo $form->field($model, 'nama_struk') ?>

    <?php // echo $form->field($model, 'kode_kelompok') ?>

    <?php // echo $form->field($model, 'nama_kelompok') ?>

    <?php // echo $form->field($model, 'kode_jenis') ?>

    <?php // echo $form->field($model, 'nama_jenis') ?>

    <?php // echo $form->field($model, 'kode_obyek') ?>

    <?php // echo $form->field($model, 'nama_obyek') ?>

    <?php // echo $form->field($model, 'kode_rincian') ?>

    <?php // echo $form->field($model, 'nama_rincian') ?>

    <?php // echo $form->field($model, 'penjabaran') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'satuan') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
