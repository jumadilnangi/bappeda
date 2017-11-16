<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

use kartik\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRenjaSearch */
/* @var $form yii\widgets\ActiveForm */

$js = <<< JS
    $(document).on('submit', 'form[data-pjax]', function(event) {
        $.pjax.submit(event, '#grid_container');
    })
    $('#id_ta').change(function() {
        $('#test-form').submit();
    });
    $('#id_skpd').change(function() {
        $('#test-form').submit();
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

$form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'type' => ActiveForm::TYPE_INLINE,
    'fieldConfig' => ['autoPlaceholder'=>true],
    'formConfig' => ['deviceSize' => ActiveForm::SIZE_SMALL],
    'options' => ['data-pjax' => 'true', 'id' => 'test-form']
]);

//echo $form->field($model, 'mb_tahun_anggaran_id')
echo $form->field($model, 'mb_tahun_anggaran_id')->widget(Select2::classname(), [
    'theme' => Select2::THEME_BOOTSTRAP,
    'options' => [
        'placeholder' => 'Tahun Anggaran',
        'id' => 'id_ta',
    ],
    'pluginOptions' => [
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

//echo $form->field($model, 'mb_skpd_nama');
echo $form->field($model, 'mb_skpd_nama')->widget(Select2::classname(), [
    'theme' => Select2::THEME_BOOTSTRAP,
    'options' => [
        'placeholder' => 'SKPD...',
        'id' => 'id_skpd',
    ],
    'pluginOptions' => [
        'width' => '500px',
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
]);
?>
<!--div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div-->
<?php ActiveForm::end(); ?>

</div>
