<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-kegiatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_kegiatan_id') ?>

    <?= $form->field($model, 'mb_program_id') ?>

    <?= $form->field($model, 'mb_kegiatan_kode') ?>

    <?= $form->field($model, 'mb_kegiatan_nama') ?>

    <?= $form->field($model, 'mb_kegiatan_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
