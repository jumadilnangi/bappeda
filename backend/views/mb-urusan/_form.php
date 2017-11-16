<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;

use backend\models\MbUrusanJenis;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusan */
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
        <?= $form->field($model, 'mb_urusan_jenis_id')->dropDownList(
             ArrayHelper::map(MbUrusanJenis::find()->all(),'mb_urusan_jenis_id','mb_urusan_jenis_nama'),
            [
                'prompt'=>'Pilih Jenis',
            ]); ?>

        <?= $form->field($model, 'mb_urusan_kode')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_urusan_nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_urusan_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
