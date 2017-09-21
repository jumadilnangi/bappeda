<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbUrusanJenis;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-urusan-form">

    <?php $form = ActiveForm::begin(); ?>

     
    <?= $form->field($model, 'mb_urusan_jenis_id')->dropDownList(
             ArrayHelper::map(MbUrusanJenis::find()->all(),'mb_urusan_jenis_id','mb_urusan_jenis_nama'),
            [
                'prompt'=>'Pilih Jenis',
            ]); ?>

    <?= $form->field($model, 'mb_urusan_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_urusan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_urusan_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
