<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

use kartik\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\dialog\Dialog;

use backend\models\customs\Rkpd;

$this->title = 'RKPD';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    //'action' => ['cari'],
    'id' => 'test-form',
    //'method' => 'get',
    'type' => ActiveForm::TYPE_INLINE,
    //'fieldConfig' => ['autoPlaceholder'=>true],
    //'formConfig' => ['deviceSize' => ActiveForm::SIZE_SMALL],
    //'options' => ['id' => 'test-form']
]);
$this->registerJs($this->render('proses.js'), \yii\web\View::POS_READY);
$this->registerJs($js);
//DialogAsset::register($this);
echo Dialog::widget([
   'libName' => 'krajeeDialog',
   //'options => [], // default options
]);

//echo Html::beginForm(['mb_rkpd/search'], 'post', ['id' => 'test-form', 'class' => 'form-inline']);
?>
<div class="box box-default">
	<div class="box-header with-border">
        <?php
            echo $form->field($model, 'mb_tahun_anggaran_id')->widget(Select2::classname(), [
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'Tahun Anggaran',
                    'id' => 'id_ta',
                ],
                'pluginOptions' => [
                    //'allowClear' => true,
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

            echo $form->field($model, 'id_skpd')->widget(Select2::classname(), [
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => [
                    'placeholder' => 'SKPD',
                    'id' => 'id_skpd',
                ],
                'pluginOptions' => [
                    'width' => '400px',
                    //'allowClear' => true,
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
            ]);
        ?>
        <?= Html::submitButton('Tampilkan', ['class' => 'btn btn-info btn-search']) ?>
        <div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
        <div class="isi"></div> 
    </div>
</div>
<!--?= Html::endForm() ?-->
<?php ActiveForm::end(); ?>