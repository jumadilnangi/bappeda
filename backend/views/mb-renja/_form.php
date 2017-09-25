<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\web\JsExpression;

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;

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
			echo $form->field($model, 'mb_tahun_anggaran_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'options' => [
					'placeholder' => 'Thn Anggaran..',
				],
				'pluginOptions' => [
					'width' => '150px',
					'allowClear' => true,
					'language' => [
						'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
					],
					'ajax' => [
						'url' => Url::to(['data/getidta']),
						'type' => 'POST',
						'dataType' => 'json',
						'delay' => 20,
						'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
						'cache' => 'true'
					],
				],
			]);

			echo $form->field($modelUrusan, 'mb_urusan_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'options' => [
					'placeholder' => 'Urusan..',
					'id' => 'id_urusan',
				],
				'pluginOptions' => [
					//'width' => '500px',
					'allowClear' => true,
					'language' => [
						'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
					],
					'ajax' => [
						'url' => Url::to(['data/geturusan']),
						'type' => 'POST',
						'dataType' => 'json',
						'delay' => 20,
						'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
						'cache' => 'true'
					],
				],
			]);

			echo $form->field($modelSkpd, 'mb_urusan_has_skpd_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'options' => ['id' => 'id_skpd'],
				'select2Options'=>[
					'theme' => Select2::THEME_BOOTSTRAP,
					'options' => ['placeholder' => 'Pilih SKPD...'],
					'pluginOptions'=>[
						'allowClear'=>true,
						//'width' => '400px'
					]
				],
				'pluginOptions'=>[
					'depends'=>['id_urusan'],
					'url' => Url::to(['suburusan']),
					'loadingText' => 'Mengambil data SKPD...',
				]
			]);

			echo $form->field($modelProgram, 'mb_program_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
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

			echo $form->field($model, 'mb_kegiatan_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'options' => ['id' => 'id_kegiatan'],
				'select2Options'=>[
					'theme' => Select2::THEME_BOOTSTRAP,
					'options' => ['placeholder' => 'Pilih Kegiatan...'],
					'pluginOptions'=>[
						'allowClear'=>true,
						//'width' => '400px'
					]
				],
				'pluginOptions'=>[
					'depends'=>['id_program'],
					'url' => Url::to(['subkegiatan']),
					'loadingText' => 'Mengambil data Kegiatan...',
				]
			]);

			echo $form->field($modelPrioritas, 'mb_prioritas_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'options' => [
					'placeholder' => 'Priortas Daerah..',
					'id' => 'id_prioritas',
				],
				'pluginOptions' => [
					//'width' => '500px',
					'allowClear' => true,
					'language' => [
						'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
					],
					'ajax' => [
						'url' => Url::to(['data/getprioritas']),
						'type' => 'POST',
						'dataType' => 'json',
						'delay' => 20,
						'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
						'cache' => 'true'
					],
				],
			]);

			echo $form->field($model, 'mb_sasaran_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'options' => ['id' => 'id_sasaran'],
				'select2Options'=>[
					'theme' => Select2::THEME_BOOTSTRAP,
					'options' => ['placeholder' => 'Pilih Sasaran...'],
					'pluginOptions'=>[
						'allowClear'=>true,
						//'width' => '400px'
					]
				],
				'pluginOptions'=>[
					'depends'=>['id_prioritas'],
					'url' => Url::to(['subsasaran']),
					'loadingText' => 'Mengambil data Sasaran...',
				]
			]);
		?>

		<?= $form->field($model, 'mb_renja_pagu_indikatif')->textInput() ?>

		<?= $form->field($model, 'mb_renja_indikator_kegiatan')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'mb_renja_sasaran_keg')->textarea(['rows' => 6]) ?>
		
		<legend>Tolak Ukur Kerja</legend>
		<?= $form->field($model, 'mb_renja_hasil_prog_tolak_ukur')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_keluaran_tolak_ukur')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_hasil_kerja_tolak_ukur')->textInput(['maxlength' => true]) ?>

		<legend>Target Kerja</legend>
		<?= $form->field($model, 'mb_renja_hasil_prog_target_kerja')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_keluaran_tolak_target_kerja')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_hasil_kerja_tolak_target_kerja')->textInput(['maxlength' => true]) ?>

		<legend>Target Capaian</legend>
		<?= $form->field($model, 'mb_renja_target_capaian')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_target_capaian_thn_maju')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'mb_renja_ket')->textarea(['rows' => 6]) ?>

	</div>
	<div class="box-footer">
		<div class="box-tools pull-right">
			<!--button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button-->
			<?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
			<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>