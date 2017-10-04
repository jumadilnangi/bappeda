<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

use kartik\form\ActiveForm;
use kartik\select2\Select2;

use backend\models\MbKelurahanDesa;
use backend\models\MbUraianPekerjaan;

$form = ActiveForm::begin([
    //'id' => 'submit_form',
    //'type' => ActiveForm::TYPE_INLINE,
    'type' => ActiveForm::TYPE_HORIZONTAL,
    //'formConfig' => ['labelSpan' => 2]
]);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord ? 'Tambah Data' : 'Edit Data' ?></h3>

        <div class="box-tools pull-right">
            <!--button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button-->
            <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="box-body">
        <?php 
            echo $id_uraian; 
            if (!empty($id_uraian)) {
                $model->mb_uraian_pekerjaan_id = $id_uraian;
            }
        ?>
        <?= $form->field($model, 'mb_uraian_pekerjaan_id')->dropDownList(
             ArrayHelper::map(MbUraianPekerjaan::find()->all(),'mb_uraian_pekerjaan_id','mb_uraian_pekerjaan_nama'),
            [
                'prompt'=>'Pilih Pekerjaan',
            ]); ?>
    
      <?= $form->field($model, 'mb_kelurahan_desa_id')->dropDownList(
             ArrayHelper::map(MbKelurahanDesa::find()->all(),'mb_kelurahan_desa_id','mb_kelurahan_desa_nama'),
            [
                'prompt'=>'Pilih Kelurahan / Desa',
            ]); ?>


    <?= $form->field($model, 'mb_lokasi_pekerjaan_latitudes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_longitudes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_rw')->widget(MaskedInput::className(), ['mask' => '99',]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_rt')->widget(MaskedInput::className(), ['mask' => '99',]) ?>

    <?= $form->field($model, 'mb_lokasi_pekerjaan_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>