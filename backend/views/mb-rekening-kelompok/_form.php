<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-kelompok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rekening_struk_id')->textInput() ?>

    <?= $form->field($model, 'mb_rekening_kelompok_kode')->textInput() ?>

    <?= $form->field($model, 'mb_rekening_kelompok_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_kelompok_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
