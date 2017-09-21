<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProvinsi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-provinsi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_provinsi_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_provinsi_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
