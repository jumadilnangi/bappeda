<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbUrusan;
use backend\models\MbSkpd;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-urusan-has-skpd-form">

    <?php $form = ActiveForm::begin(); ?>

      
     <?= $form->field($model, 'mb_urusan_id')->dropDownList(
             ArrayHelper::map(MbUrusan::find()->all(),'mb_urusan_id','mb_urusan_nama'),
            [
                'prompt'=>'Pilih Urusan',
            ]); ?>


         <?= $form->field($model, 'mb_skpd_id')->dropDownList(
             ArrayHelper::map(MbSkpd::find()->all(),'mb_skpd_id','mb_skpd_nama'),
            [
                'prompt'=>'Pilih SKPD',
            ]); ?>
    
    
    <?= $form->field($model, 'mb_urusan_has_skpd_mulai')->textInput() ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_akhir')->textInput() ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_urusan_has_skpd_ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
