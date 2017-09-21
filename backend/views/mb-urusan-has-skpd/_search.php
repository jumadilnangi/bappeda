<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-urusan-has-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_id') ?>

    <?= $form->field($model, 'mb_urusan_id') ?>

    <?= $form->field($model, 'mb_skpd_id') ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_mulai') ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_akhir') ?>

    <?php // echo $form->field($model, 'mb_urusan_has_skpd_sk') ?>

    <?php // echo $form->field($model, 'mb_urusan_has_skpd_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
