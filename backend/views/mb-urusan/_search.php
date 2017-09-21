<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-urusan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_urusan_id') ?>

    <?= $form->field($model, 'mb_urusan_jenis_id') ?>

    <?= $form->field($model, 'mb_urusan_kode') ?>

    <?= $form->field($model, 'mb_urusan_nama') ?>

    <?= $form->field($model, 'mb_urusan_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
