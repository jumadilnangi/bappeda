<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbPrioritasNasional;
use backend\models\MbProgram;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgramHasPrioritasNasional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-program-has-prioritas-nasional-form">

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

    <?= $form->field($model, 'mb_prioritas_nasional_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbPrioritasNasional::find()->all(),'mb_prioritas_nasional_id','mb_prioritas_nasional_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Prioritas Nasional'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_program_has_prioritas_nasional_awal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_program_has_prioritas_nasional_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_program_has_prioritas_nasional_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
