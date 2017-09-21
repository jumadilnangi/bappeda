<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTujuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-tujuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rpjmd_misi_id')->textInput() ?>

    <?= $form->field($model, 'mb_tujuan_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_tujuan_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
