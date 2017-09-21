<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_skpd_id') ?>

    <?= $form->field($model, 'mb_skpd_kode') ?>

    <?= $form->field($model, 'mb_skpd_nama') ?>

    <?= $form->field($model, 'mb_skpd_singkatan') ?>

    <?= $form->field($model, 'mb_skpd_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
