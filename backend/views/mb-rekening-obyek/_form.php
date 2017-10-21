<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRekeningJenis;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rekening-obyek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mb_rekening_jenis_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbRekeningJenis::find()->all(),'mb_rekening_jenis_id','mb_rekening_jenis_nama'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Jenis Rekening'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_rekening_obyek_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_obyek_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_rekening_obyek_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
