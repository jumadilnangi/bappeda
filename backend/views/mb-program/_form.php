<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

use kartik\select2\Select2;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */
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
		<!--?= $form->field($model, 'mb_urusan_has_skpd_id')->textInput() ?-->
		<?php
			/*
            SELECT mb_urusan_has_skpd_id
                FROM mb_urusan_has_skpd
                WHERE mb_urusan_has_skpd_id = :cari
            */
            $_value['name'] = '';
            if (isset($model->mb_urusan_has_skpd_id)) {
                $_value = Yii::$app->db->createCommand("SELECT mb_urusan_has_skpd_id AS id,
                            CONCAT(urus.mb_urusan_nama,' / ',skpd.mb_skpd_nama) AS name
                        FROM mb_urusan_has_skpd AS uskpd
                        JOIN mb_urusan AS urus ON uskpd.mb_urusan_id = urus.mb_urusan_id
                        JOIN mb_skpd AS skpd ON uskpd.mb_skpd_id = skpd.mb_skpd_id
                        WHERE mb_urusan_has_skpd_id = :id")
                    ->bindValue(':id', $model->mb_urusan_has_skpd_id)
                    ->queryOne();

            }
            echo $form->field($model, 'mb_urusan_has_skpd_id')->widget(Select2::classname(),[
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'initValueText' => $_value['name'],
                    'options' => [
                        'placeholder' => 'Urusan dan SKPD..',
                        //'id' => 'id_program',
                    ],
                    'pluginOptions' => [
                        //'width' => '500px',
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['data/geturusanskpd']),
                            'type' => 'POST',
                            'dataType' => 'json',
                            'delay' => 20,
                            'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                            'cache' => 'true'
                        ],
                    ],
                ]);
		?>

	    <?= $form->field($model, 'mb_program_kode')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'mb_program_nama')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'mb_program_ket')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<?php ActiveForm::end(); ?>