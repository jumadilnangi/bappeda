<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

use kartik\form\ActiveForm;
use kartik\select2\Select2;

use backend\models\MbSumberDana;
use backend\models\MbRenja;
use backend\models\customs\UraianStatus;

$form = ActiveForm::begin([
    //'id' => 'submit_form',
    //'type' => ActiveForm::TYPE_INLINE,
    'type' => ActiveForm::TYPE_HORIZONTAL,
    //'formConfig' => ['labelSpan' => 2]
]);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data</h3>

        <div class="box-tools pull-right">
            <!--button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button-->
            <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="box-body">
        <?php
            echo $form->field($model, 'mb_renja_id')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Kegiatan Rencana Kerja',
                ],
                'pluginOptions' => [
                    //'width' => '500px',
                    'allowClear' => true,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['data/getrenja']),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'delay' => 20,
                        'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                        'cache' => 'true'
                    ],
                ],
            ]);

            echo $form->field($model, 'mb_sumber_dana_id')->dropDownList(
                ArrayHelper::map(MbSumberDana::find()->all(),'mb_sumber_dana_id','mb_sumber_dana_nama'), [
                    'prompt'=>'Pilih Sumber Dana',
            ]);

            echo $form->field($modelLokasi, 'mb_kelurahan_desa_id')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Lokasi Pekerjaan',
                ],
                'pluginOptions' => [
                    //'width' => '500px',
                    'allowClear' => true,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['data/getlokasi']),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'delay' => 20,
                        'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                        'cache' => 'true'
                    ],
                ],
            ]);

            echo $form->field($model, 'mb_uraian_pekerjaan_nama')->textarea(['rows' => 6]);

            echo $form->field($model, 'mb_uraian_pekerjaan_vol')->textInput();

            echo $form->field($model, 'mb_uraian_pekerjaan_satuan')->textInput(['maxlength' => true]);

            echo $form->field($model, 'mb_uraian_pekerjaan_harga_satuan')->textInput();

            echo $form->field($model, 'mb_uraian_pekerjaan_pagu_tahun_maju')->textInput();

            echo $form->field($modelStatus, 'mb_uraian_status_id')->dropDownList(
                ArrayHelper::map(UraianStatus::find()->all(),'mb_uraian_status_id','mb_uraian_status_nama'), [
                    'prompt'=>'Status Pekerjaan',
            ]);
        ?>
    </div>
</div>
<?php ActiveForm::end(); ?>