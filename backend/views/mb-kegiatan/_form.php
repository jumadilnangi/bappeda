<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

use kartik\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;

use backend\models\MbSkpd;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */
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
        <?php
            $_value['name'] = '';
            if (isset($model->mb_program_id)) {
                $_value = Yii::$app->db->createCommand("SELECT mb_skpd_id AS id, 
                            mb_skpd_nama AS name
                        FROM mb_skpd
                        WHERE mb_skpd_id = :id")
                    ->bindValue(':id', $model->mbProgram->mbUrusanHasSkpd->mbSkpd->mb_skpd_id)
                    ->queryOne();
            }
            $modelSkpd->mb_skpd_id = $_value ? $_value['name'] : $modelSkpd->mb_skpd_id;
            echo $form->field($modelSkpd, 'mb_skpd_id')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                //'initValueText' => $_opd,
                'options' => [
                    'placeholder' => 'Pilih OPD..',
                    'id' => 'id_skpd',
                ],
                'pluginOptions' => [
                    //'width' => '150px',
                    'allowClear' => true,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['data/getskpd']),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'delay' => 20,
                        'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                        'cache' => 'true'
                    ],
                ],
            ])->label('OPD');

            //dependropdown
            $_value['id'] = '';
            $_value['name'] = '';
            if (isset($model->mb_program_id)) {
                $_value = Yii::$app->db->createCommand("SELECT prog.mb_program_id AS id,
                            CONCAT(prog.mb_program_kode,' - ', prog.mb_program_nama) AS name
                        FROM mb_kegiatan AS keg
                        JOIN mb_program AS prog USING(mb_program_id)
                        JOIN mb_urusan_has_skpd AS hskpd USING(mb_urusan_has_skpd_id)
                        JOIN mb_skpd AS skpd USING(mb_skpd_id)
                        WHERE keg.mb_kegiatan_id = :id")
                    ->bindValue(':id', $model->mb_kegiatan_id)
                    ->queryOne();
            }
            echo $form->field($model, 'mb_program_id')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'data' => [$_value['id'] => $_value['name']],
                'options' => ['id' => 'id_program'],
                'select2Options'=>[
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => ['placeholder' => 'Pilih Program...'],
                    'pluginOptions'=>[
                        'allowClear'=>true,
                        //'width' => '400px'
                    ]
                ],
                'pluginOptions'=>[
                    'depends'=>['id_skpd'],
                    'url' => Url::to(['subprogram']),
                    'loadingText' => 'Mengambil data Program...',
                ]
            ]);
        ?>

        <?= $form->field($model, 'mb_kegiatan_kode')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_kegiatan_nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_kegiatan_ket')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>