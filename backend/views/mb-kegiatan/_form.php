<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbProgram;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_program_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbProgram::find()->all(),'mb_program_id','mb_program_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Program'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_kegiatan_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_kegiatan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_kegiatan_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
