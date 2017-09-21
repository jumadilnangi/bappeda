<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-skpd-has-rekening-rincian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_ta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_id')->textInput() ?>

    <?= $form->field($model, 'mb_rekening_rincian_id')->textInput() ?>
    
    

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_penjabaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_vol')->textInput() ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_harga')->textInput() ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_ket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_skpd_has_rekening_rincian_created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
