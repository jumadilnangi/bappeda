<?php

use yii\helpers\Html;

use kartik\select2\Select2;
use backend\models\MbRpjmdTujuan;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */
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
        <?php $model->mb_rpjmd_tujuan_id = isset($id_tujuan) ? $id_tujuan : $model->mb_rpjmd_tujuan_id; ?>
        <?= $form->field($model, 'mb_rpjmd_tujuan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(MbRpjmdTujuan::find()->all(),'mb_rpjmd_tujuan_id','mb_tujuan_isi'),
            'language' => 'en',
           // 'tabindex' => false,
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Pilih Tujuan'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
      
        ?>

        <?= $form->field($model, 'mb_sasaran_isi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'mb_sasaran_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>