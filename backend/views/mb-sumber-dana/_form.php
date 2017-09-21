<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSumberDana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-sumber-dana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_sumber_dana_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
