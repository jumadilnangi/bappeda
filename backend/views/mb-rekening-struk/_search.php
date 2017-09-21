<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStrukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-struk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_rekening_struk_id') ?>

    <?= $form->field($model, 'mb_rekening_struk_kode') ?>

    <?= $form->field($model, 'mb_rekening_struk_nama') ?>

    <?= $form->field($model, 'mb_rekening_struk_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
