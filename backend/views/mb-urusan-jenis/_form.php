<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanJenis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-urusan-jenis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_urusan_jenis_kode')->textInput() ?>

    <?= $form->field($model, 'mb_urusan_jenis_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
