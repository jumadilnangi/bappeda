<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritasNasional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-prioritas-nasional-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'mb_prioritas_nasional_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_prioritas_nasional_nama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_prioritas_nasional_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
