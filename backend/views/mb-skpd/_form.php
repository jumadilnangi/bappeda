<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-skpd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_skpd_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_skpd_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_skpd_singkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_skpd_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
