<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbKecamatan;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-kelurahan-desa-form">

    <?php $form = ActiveForm::begin(); ?>

    

       
     <?= $form->field($model, 'mb_kecamatan_id')->dropDownList(
             ArrayHelper::map(MbKecamatan::find()->all(),'mb_kecamatan_id','mb_kecamatan_nama'),
            [
                'prompt'=>'Pilih Kecamatan',
            ]); ?>

    <?= $form->field($model, 'mb_kelurahan_desa_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_kelurahan_desa_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
