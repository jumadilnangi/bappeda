<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRpjmdSasaran;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord ? 'Tambah Data' : 'Edit Data' ?></h3>

        <div class="box-tools pull-right">
            <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="box-body">
        <?php $model->mb_rpjmd_sasaran_id = isset($id_sasaran) ? $id_sasaran : $model->mb_rpjmd_sasaran_id; ?>
        <?= $form->field($model, 'mb_rpjmd_sasaran_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(MbRpjmdSasaran::find()->all(),'mb_rpjmd_sasaran_id','mb_sasaran_isi'),
            'language' => 'en',
           // 'tabindex' => false,
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Pilih Sasaran'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
      
        ?>

        <?= $form->field($model, 'mb_indikator_kinerja_isi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_satuan')->textInput(['style' => 'width: 100px', 'maxlength' => true]) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_awal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_target_1')->textInput(['style' => 'width: 100px']) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_target_2')->textInput(['style' => 'width: 100px']) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_target_3')->textInput(['style' => 'width: 100px']) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_target_4')->textInput(['style' => 'width: 100px']) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_target_5')->textInput(['style' => 'width: 100px']) ?>

        <?= $form->field($model, 'mb_indikator_kinerja_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>