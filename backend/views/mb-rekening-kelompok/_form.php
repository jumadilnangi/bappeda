<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRekeningStruk;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningKelompok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-kelompok-form">

    <?php $form = ActiveForm::begin(); ?>


    
    <?= $form->field($model, 'mb_rekening_struk_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbRekeningStruk::find()->all(),'mb_rekening_struk_id','mb_rekening_struk_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Struk Rekening'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_rekening_kelompok_kode')->textInput() ?>

    <?= $form->field($model, 'mb_rekening_kelompok_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_kelompok_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
