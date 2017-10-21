<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbUrusanHasSkpd;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-program-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'mb_urusan_has_skpd_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbUrusanHasSkpd::find()->all(),'mb_urusan_has_skpd_id','mbUrusan.mb_urusan_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Urusan'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_program_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_program_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_program_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
