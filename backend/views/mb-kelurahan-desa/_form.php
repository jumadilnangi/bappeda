<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\MbKecamatan;

/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */
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
        <?= $form->field($model, 'mb_kecamatan_id')->dropDownList(
             ArrayHelper::map(MbKecamatan::find()->all(),'mb_kecamatan_id','mb_kecamatan_nama'),
            [
                'prompt'=>'Pilih Kecamatan',
            ]); ?>

            <?= $form->field($model, 'mb_kelurahan_desa_kode')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mb_kelurahan_desa_nama')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>