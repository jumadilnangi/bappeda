<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSasaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-sasaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_prioritas_id')->textInput() ?>

    <?= $form->field($model, 'mb_sasaran_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_sasaran_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
