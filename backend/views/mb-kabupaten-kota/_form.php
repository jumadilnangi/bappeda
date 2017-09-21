<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKabupatenKota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-kabupaten-kota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_provinsi_id')->textInput() ?>

    <?= $form->field($model, 'mb_kabupaten_kota_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_kabupaten_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
