<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\web\JsExpression;

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;

use backend\models\MbTahunAnggaran;
use backend\models\MbUrusan;
use backend\models\MbKegiatan;
use backend\models\MbProgram;
use backend\models\MbUrusanHasSkpd;

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
			$_ta = isset($model->mb_tahun_anggaran_id) ? MbTahunAnggaran::findOne($model->mb_tahun_anggaran_id)->mb_tahun_anggaran_nama : '';
			echo $form->field($model, 'mb_tahun_anggaran_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'initValueText' => $_ta,
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
			$_value['name'] = '';
			if (isset($model->mb_kegiatan_id)) {
				$_value = Yii::$app->db->createCommand("SELECT mb_urusan_id AS id, 
							CONCAT(mb_urusan_kode, ' ',mb_urusan_nama) AS name
						FROM mb_urusan AS urus
						WHERE mb_urusan_id = :id")
					->bindValue(':id', $model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mbUrusan->mb_urusan_id)
					->queryOne();

			}
			$modelUrusan->mb_urusan_id = $_value ? $_value['name'] : $modelUrusan->mb_urusan_id;
			echo $form->field($modelUrusan, 'mb_urusan_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'initValueText' => $_value['name'],
				'options' => [
					'placeholder' => 'Unit Kerja..',
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

			$_value['id'] = '';
			$_value['name'] = '';
			if (isset($model->mb_kegiatan_id)) {
				$_value = Yii::$app->db->createCommand("SELECT 
							hs.mb_urusan_has_skpd_id AS id, sk.mb_skpd_nama AS name
						FROM mb_urusan_has_skpd AS hs
						JOIN mb_skpd AS sk ON hs.mb_skpd_id = sk.mb_skpd_id
						WHERE hs.mb_urusan_has_skpd_id = :id")
					->bindValue(':id', $model->mbKegiatan->mbProgram->mbUrusanHasSkpd->mb_urusan_has_skpd_id)
					->queryOne();
			}
			echo $form->field($modelSkpd, 'mb_urusan_has_skpd_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'data' => [$_value['id'] => $_value['name']],
				'options' => ['id' => 'id_skpd'],
				'select2Options'=>[
					'theme' => Select2::THEME_BOOTSTRAP,
					'options' => ['placeholder' => 'Pilih OPD...'],
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

			$_value['id'] = '';
			$_value['name'] = '';
			if (isset($model->mb_kegiatan_id)) {
				$_value = Yii::$app->db->createCommand("SELECT mb_program_id AS id,
							CONCAT(mb_program_kode,' - ', mb_program_nama) AS name
						FROM mb_program
						WHERE mb_program_id = :id")
					->bindValue(':id', $model->mbKegiatan->mbProgram->mb_program_id)
					->queryOne();
			}
			echo $form->field($modelProgram, 'mb_program_id')->widget(DepDrop::classname(), [
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
			$_value['id'] = '';
			$_value['name'] = '';
			if (isset($model->mb_kegiatan_id)) {
				$_value = Yii::$app->db->createCommand("SELECT mb_kegiatan_id AS id, 
							CONCAT(mb_kegiatan_kode, ' - ', mb_kegiatan_nama) AS name
						FROM mb_kegiatan
						WHERE mb_kegiatan_id = :id")
					->bindValue(':id', $model->mb_kegiatan_id)
					->queryOne();
			}
			echo $form->field($model, 'mb_kegiatan_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'data' => [$_value['id'] => $_value['name']],
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

			$_value['name'] = '';
			if (isset($model->mb_kegiatan_id)) {
				$_value = Yii::$app->db->createCommand("SELECT mb_prioritas_id AS id, 
							mb_prioritas_nama AS name
						FROM mb_prioritas
						WHERE mb_prioritas_id = :id")
					->bindValue(':id', $model->mbSasaran->mbPrioritas->mb_prioritas_id)
					->queryOne();

			}
			$modelPrioritas->mb_prioritas_id = $_value ? $_value['name'] : $modelPrioritas->mb_prioritas_id;

			echo $form->field($modelPrioritas, 'mb_prioritas_id')->widget(Select2::classname(),[
				'theme' => Select2::THEME_BOOTSTRAP,
				'initValueText' => $_value['name'],
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

			$_value['id'] = '';
			$_value['name'] = '';
			if (isset($model->mb_sasaran_id)) {
				$_value = Yii::$app->db->createCommand("SELECT mb_sasaran_id AS id, 
							mb_sasaran_nama AS name
						FROM mb_sasaran
						WHERE mb_sasaran_id = :id")
					->bindValue(':id', $model->mb_sasaran_id)
					->queryOne();
			}
			echo $form->field($model, 'mb_sasaran_id')->widget(DepDrop::classname(), [
				'type' => DepDrop::TYPE_SELECT2,
				'data' => [$_value['id'] => $_value['name']],
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

		<!--?= $form->field($model, 'mb_renja_pagu_indikatif')->textInput() ?-->

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