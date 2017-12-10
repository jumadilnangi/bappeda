<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use backend\models\MbRpjmdVisi;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisi */
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
        <?php $model->mb_rpjmd_visi_id = isset($id_visi) ? $id_visi : $model->mb_rpjmd_visi_id ;?>
        <?= $form->field($model, 'mb_rpjmd_visi_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(MbRpjmdVisi::find()->all(),'mb_rpjmd_visi_id','mb_rpjmd_visi_isi'),
            'language' => 'en',
           // 'tabindex' => false,
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Pilih Visi'],
            'pluginOptions' => [
                'allowClear' => true
                ],
            ]);
      
        ?>
        
        <?= $form->field($model, 'mb_rpjmd_misi_isi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'mb_rpjmd_misi_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>