<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRpjmdSasaran;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-indikator-kinerja-form">

    <?php $form = ActiveForm::begin(); ?>

   
    
    
    <?= $form->field($model, 'mb_rpjmd_sasaran_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbRpjmdSasaran::find()->all(),'mb_rpjmd_sasaran_id','mb_sasaran_isi'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Sasaran'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_indikator_kinerja_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_indikator_kinerja_satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_indikator_kinerja_awal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_indikator_kinerja_target_1')->textInput() ?>

    <?= $form->field($model, 'mb_indikator_kinerja_target_2')->textInput() ?>

    <?= $form->field($model, 'mb_indikator_kinerja_target_3')->textInput() ?>

    <?= $form->field($model, 'mb_indikator_kinerja_target_4')->textInput() ?>

    <?= $form->field($model, 'mb_indikator_kinerja_target_5')->textInput() ?>

    <?= $form->field($model, 'mb_indikator_kinerja_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
