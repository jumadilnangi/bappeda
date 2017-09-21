<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbSumberDana;
use backend\models\MbRenja;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-uraian-pekerjaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_renja_id')->dropDownList(
             ArrayHelper::map(MbRenja::find()->all(),'mb_renja_id','mb_renja_id'),
            [
                'prompt'=>'Pilih Rencana Kerja',
            ]); ?>
    <?= $form->field($model, 'mb_sumber_dana_id')->dropDownList(
             ArrayHelper::map(MbSumberDana::find()->all(),'mb_sumber_dana_id','mb_sumber_dana_nama'),
            [
                'prompt'=>'Pilih Sumber Dana',
            ]); ?>

   
    <?= $form->field($model, 'mb_uraian_pekerjaan_nama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_vol')->textInput() ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_harga_satuan')->textInput() ?>

    <?= $form->field($model, 'mb_uraian_pekerjaan_pagu_tahun_maju')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
