<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRekeningObyek;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningRincian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-rincian-form">

    <?php $form = ActiveForm::begin(); ?>

   
   <?= $form->field($model, 'mb_rekening_obyek_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbRekeningObyek::find()->all(),'mb_rekening_obyek_id','mb_rekening_obyek_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Kelompok Rekening'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_rekening_rincian_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_rincian_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_rincian_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
