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
		<h3 class="box-title">Form Anggaran</h3>

		<div class="box-tools pull-right">
			<!--button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button-->
			<?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger btn-sm']) ?>
			<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm' : 'btn btn-primary btn-sm']) ?>
		</div>
	</div>
	<div class="box-body">
		<table width="100%">
			<tr>
				<td width="150px" align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_skpd_has_rekening_rincian_ta', ['showLabels' => false, 'label'=>'Thn. Anggaran', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?php
						echo $form->field($model, 'mb_skpd_has_rekening_rincian_ta', ['showLabels' => false,])->widget(Select2::classname(),[
							'theme' => Select2::THEME_BOOTSTRAP,
							//'size' => Select2::SMALL,
							//'data' => $ta,
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
									'url' => Url::to(['data/getta']),
									'type' => 'POST',
									'dataType' => 'json',
									'delay' => 20,
									'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
									'cache' => 'true'
								],
							],
						]);
					?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($modelUrusan, 'mb_urusan_id', ['label'=>'Urusan', 'class'=>'control-label']) ?>
				</td>
				<td width="350px">
					<?php
						echo $form->field($modelUrusan, 'mb_urusan_id', ['showLabels' => false,])->widget(Select2::classname(),[
							'theme' => Select2::THEME_BOOTSTRAP,
							'options' => [
								'placeholder' => 'Urusan..',
								'id' => 'id_urusan',
							],
							'pluginOptions' => [
								//'width' => '200px',
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
					?>
				</td>
				<td width="100px" align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_urusan_has_skpd_id', ['label'=>'SKPD', 'class'=>'control-label']) ?>
				</td>
				<td width="350px">
					<?php
						echo $form->field($model, 'mb_urusan_has_skpd_id', ['showLabels' => false,])->widget(DepDrop::classname(), [
							//'options' => ['placeholder' => 'Pilih SKPD...'],
							'type' => DepDrop::TYPE_SELECT2,
							'select2Options'=>[
								'theme' => Select2::THEME_BOOTSTRAP,
								'options' => ['placeholder' => 'Pilih SKPD...'],
								'pluginOptions'=>[
									'allowClear'=>true,
									'width' => '400px'
								]
							],
							'pluginOptions'=>[
								'depends'=>['id_urusan'],
								'url' => Url::to(['suburusan']),
								'loadingText' => 'Mengambil data SKPD...',
							]
						]);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="padding-top: 10px">
					<legend><h4>Rincian Rekening</h4></legend>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($modelStruk, 'mb_rekening_struk_id', ['label'=>'Struk', 'class'=>'control-label']) ?>
				</td>
				<td>
					<?php
						echo $form->field($modelStruk, 'mb_rekening_struk_id', ['showLabels' => false,])->widget(Select2::classname(),[
							'theme' => Select2::THEME_BOOTSTRAP,
							//'size' => Select2::SMALL,
							'options' => [
								'placeholder' => 'Struk..',
								'id' => 'id_struk',
							],
							'pluginOptions' => [
								//'width' => '200px',
								'allowClear' => true,
								'language' => [
									'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
								],
								'ajax' => [
									'url' => Url::to(['data/getstruk']),
									'type' => 'POST',
									'dataType' => 'json',
									'delay' => 20,
									'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
									'cache' => 'true'
								],
							],
						]);
					?>
				</td>
				<td width="100px" align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($modelKelompok, 'mb_rekening_kelompok_id', ['label'=>'Kelompok', 'class'=>'control-label']) ?>
				</td>
				<td>
					<?php
						echo $form->field($modelKelompok, 'mb_rekening_kelompok_id', ['showLabels' => false,])->widget(DepDrop::classname(), [
							//'options' => ['placeholder' => 'Pilih SKPD...'],
							'type' => DepDrop::TYPE_SELECT2,
							'options' => ['id' => 'id_kelompok'],
							'select2Options'=>[
								'theme' => Select2::THEME_BOOTSTRAP,
								'options' => [
									'placeholder' => 'Pilih Kelompok...',
									//'id' => 'id_kelompok',
								],
								'pluginOptions'=>[
									'allowClear'=>true,
									'width' => '400px'
								]
							],
							'pluginOptions'=>[
								'depends'=>['id_struk'],
								'url' => Url::to(['substruk']),
								'loadingText' => 'Mengambil data Kelompok...',
							]
						]);
					?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($modelJenis, 'mb_rekening_jenis_id', ['label'=>'Jenis', 'class'=>'control-label']) ?>
				</td>
				<td>
					<?php
						echo $form->field($modelJenis, 'mb_rekening_jenis_id', ['showLabels' => false,])->widget(DepDrop::classname(), [
							//'options' => ['placeholder' => 'Pilih SKPD...'],
							'type' => DepDrop::TYPE_SELECT2,
							'options' => ['id' => 'id_jenis'],
							'select2Options'=>[
								'theme' => Select2::THEME_BOOTSTRAP,
								'options' => [
									'placeholder' => 'Pilih Jenis...',
									//'id' => 'id_kelompok',
								],
								'pluginOptions'=>[
									'allowClear'=>true,
									//'width' => '400px'
								]
							],
							'pluginOptions'=>[
								'depends'=>['id_kelompok'],
								'url' => Url::to(['subkelompok']),
								'loadingText' => 'Mengambil data Jenis...',
							]
						]);
					?>
				</td>
				<td width="100px" align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($modelObyek, 'mb_rekening_obyek_id', ['label'=>'Obyek', 'class'=>'control-label']) ?>
				</td>
				<td>
					<?php
						echo $form->field($modelObyek, 'mb_rekening_obyek_id', ['showLabels' => false,])->widget(DepDrop::classname(), [
							//'options' => ['placeholder' => 'Pilih SKPD...'],
							'type' => DepDrop::TYPE_SELECT2,
							'options' => ['id' => 'id_obyek'],
							'select2Options'=>[
								'theme' => Select2::THEME_BOOTSTRAP,
								'options' => [
									'placeholder' => 'Pilih Obyek...',
									//'id' => 'id_kelompok',
								],
								'pluginOptions'=>[
									'allowClear'=>true,
									//'width' => '400px'
								]
							],
							'pluginOptions'=>[
								'depends'=>['id_jenis'],
								'url' => Url::to(['subobyek']),
								'loadingText' => 'Mengambil data Obyek...',
							]
						]);
					?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_rekening_rincian_id', ['label'=>'Rekening', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?php
						echo $form->field($model, 'mb_rekening_rincian_id', ['showLabels' => false,])->widget(DepDrop::classname(), [
							//'options' => ['placeholder' => 'Pilih SKPD...'],
							'type' => DepDrop::TYPE_SELECT2,
							'options' => ['id' => 'id_rekening'],
							'select2Options'=>[
								'theme' => Select2::THEME_BOOTSTRAP,
								'options' => [
									'placeholder' => 'Pilih Rekening...',
									//'id' => 'id_kelompok',
								],
								'pluginOptions'=>[
									'allowClear'=>true,
									//'width' => '400px'
								]
							],
							'pluginOptions'=>[
								'depends'=>['id_obyek'],
								'url' => Url::to(['subrekening']),
								'loadingText' => 'Mengambil data Rekening...',
							]
						]);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="padding-top: 10px">
					<legend><h4>Penjabaran Rekening</h4></legend>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_skpd_has_rekening_rincian_vol', ['label'=>'Volume', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?= $form->field($model, 'mb_skpd_has_rekening_rincian_vol', ['showLabels' => false,])->textInput() ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_skpd_has_rekening_rincian_satuan', ['label'=>'Satuan', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?= $form->field($model, 'mb_skpd_has_rekening_rincian_satuan', ['showLabels' => false,])->textInput() ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_skpd_has_rekening_rincian_harga', ['label'=>'Harga', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?= $form->field($model, 'mb_skpd_has_rekening_rincian_harga', ['showLabels' => false,])->textInput() ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-right: 20px;">
					<?= Html::activeLabel($model, 'mb_skpd_has_rekening_rincian_penjabaran', ['label'=>'Uraian Penjabaran', 'class'=>'control-label']) ?>
				</td>
				<td colspan="3">
					<?= $form->field($model, 'mb_skpd_has_rekening_rincian_penjabaran', ['showLabels' => false])->textarea(['rows' => 6]) ?>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php ActiveForm::end(); ?>

