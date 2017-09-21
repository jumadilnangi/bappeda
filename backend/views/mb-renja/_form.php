<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbTahunAnggaran;
use backend\models\MbKegiatan;
use backend\models\MbSasaran;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRenja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-renja-form">

    <?php $form = ActiveForm::begin(); ?>

    
    
    <?= $form->field($model, 'mb_tahun_anggaran_id')->dropDownList(
             ArrayHelper::map(MbTahunAnggaran::find()->all(),'mb_tahun_anggaran_id','mb_tahun_anggaran_nama'),
            [
                'prompt'=>'Pilih Tahun Anggaran',
            ]); ?>
    
     <?= $form->field($model, 'mb_kegiatan_id')->dropDownList(
             ArrayHelper::map(MbKegiatan::find()->all(),'mb_kegiatan_id','mb_kegiatan_nama'),
            [
                'prompt'=>'Pilih Kegiatan',
            ]); ?>

    
    <?= $form->field($model, 'mb_sasaran_id')->dropDownList(
             ArrayHelper::map(MbSasaran::find()->all(),'mb_sasaran_id','mb_sasaran_nama'),
            [
                'prompt'=>'Pilih Sasaran',
            ]); ?>

    <?= $form->field($model, 'mb_renja_indikator_kegiatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_renja_pagu_indikatif')->textInput() ?>

    <?= $form->field($model, 'mb_renja_indikator_keg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_renja_sasaran_keg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mb_renja_hasil_prog_tolak_ukur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_hasil_prog_target_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_keluaran_tolak_ukur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_keluaran_tolak_target_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_hasil_kerja_tolak_ukur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_hasil_kerja_tolak_target_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_target_capaian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_target_capaian_thn_maju')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_renja_ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
