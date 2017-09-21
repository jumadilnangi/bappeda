<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRpjmdTujuan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-sasaran-form">

    <?php $form = ActiveForm::begin(); ?>

  
    
    <?= $form->field($model, 'mb_rpjmd_tujuan_id')->widget(Select2::classname(), [
        
        
        'data' => ArrayHelper::map(MbRpjmdTujuan::find()->all(),'mb_rpjmd_tujuan_id','mb_tujuan_isi'),
        'language' => 'en',
       // 'tabindex' => false,
        'options' => ['placeholder' => 'Pilih Tujuan'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
  
    ?>

    <?= $form->field($model, 'mb_sasaran_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_sasaran_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
