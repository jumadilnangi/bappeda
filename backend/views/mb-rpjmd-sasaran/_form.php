<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-sasaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rpjmd_tujuan_id')->textInput() ?>

    <?= $form->field($model, 'mb_sasaran_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_sasaran_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
