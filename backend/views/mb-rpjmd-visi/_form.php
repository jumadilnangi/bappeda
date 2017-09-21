<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-visi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rpjmd_visi_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_rpjmd_visi_awal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rpjmd_visi_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rpjmd_visi_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
