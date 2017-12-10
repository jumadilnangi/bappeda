<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use backend\models\MbRpjmdMisi;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdTujuan */
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
        <?php $model->mb_rpjmd_misi_id = isset($id_misi) ? $id_misi : $model->mb_rpjmd_misi_id; ?>
        <?= $form->field($model, 'mb_rpjmd_misi_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(MbRpjmdMisi::find()->all(),'mb_rpjmd_misi_id','mb_rpjmd_misi_isi'),
            'language' => 'en',
           // 'tabindex' => false,
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Pilih Misi'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
      
        ?>

        <?= $form->field($model, 'mb_tujuan_isi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'mb_tujuan_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>