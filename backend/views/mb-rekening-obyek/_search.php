<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyekSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-obyek-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_rekening_obyek_id') ?>

    <?= $form->field($model, 'mb_rekening_jenis_id') ?>

    <?= $form->field($model, 'mb_rekening_obyek_kode') ?>

    <?= $form->field($model, 'mb_rekening_obyek_nama') ?>

    <?= $form->field($model, 'mb_rekening_obyek_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
