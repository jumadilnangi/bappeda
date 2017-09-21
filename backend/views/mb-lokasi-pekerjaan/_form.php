<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MbKelurahanDesa;
use yii\helpers\ArrayHelper;
use backend\models\MbUraianPekerjaan;

/* @var $this yii\web\View */
/* @var $model backend\models\MbLokasiPekerjaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-lokasi-pekerjaan-form">

    <?php $form = ActiveForm::begin(); ?>

   

   <?= $form->field($model, 'mb_uraian_pekerjaan_id')->dropDownList(
             ArrayHelper::map(MbUraianPekerjaan::find()->all(),'mb_uraian_pekerjaan_id','mb_uraian_pekerjaan_nama'),
            [
                'prompt'=>'Pilih Pekerjaan',
            ]); ?>
    
      <?= $form->field($model, 'mb_kelurahan_desa_id')->dropDownList(
             ArrayHelper::map(MbKelurahanDesa::find()->all(),'mb_kelurahan_desa_id','mb_kelurahan_desa_nama'),
            [
                'prompt'=>'Pilih Kelurahan / Desa',
            ]); ?>


    <?= $form->field($model, 'mb_lokasi_pekerjaan_latitudes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_longitudes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
