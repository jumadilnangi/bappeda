<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-misi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rpjmd_visi_id')->textInput() ?>

    <?= $form->field($model, 'mb_rpjmd_misi_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_rpjmd_misi_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
