<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\select2\Select2;
use backend\models\MbRekeningRincian;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(); 

$querySkpd = Yii::$app->db
    ->createCommand("SELECT mb_skpd_id AS id, mb_skpd_nama AS text
        FROM mb_skpd
        WHERE mb_skpd_id=:cari")
    ->bindValue(':cari', $model->mb_urusan_has_skpd_id)
    ->queryOne();
//print_r($querySkpd);
$_skpd = empty($model->mb_urusan_has_skpd_id)?'':$querySkpd['text'];


$queryRinci = Yii::$app->db
    ->createCommand("SELECT 
            mb_rekening_rincian_id AS id, mb_rekening_rincian_nama AS text
        FROM mb_rekening_rincian
        WHERE mb_rekening_rincian_id=:cari")
    ->bindValue(':cari', $model->mb_rekening_rincian_id)
    ->queryOne();
//print_r($queryRinci);
$_rinci = empty($model->mb_rekening_rincian_id)?'':$queryRinci['text'];

$ta = [];
//for ($i=1980; $i <= date('Y'); $i++) { 
for ($i=date('Y')+1; $i >= 1985 ; $i--) { 
    $ta[$i] = $i;
}
?>
<div class="box box-default">
    <div class="box-header with-border">
        <!--?= Html::button('Penyusunan Anggaran', ['value' => Url::to(['create']), 'class' => 'btn btn-danger','id'=>'modalButton']) ?-->
        <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Kembali', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" aria-hidden="true"></i> Simpan' : '<i class="fa fa-check" aria-hidden="true"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php 
            //echo $form->field($model, 'mb_skpd_has_rekening_rincian_ta')->textInput(['maxlength' => true]) 
            //echo $form->field($model, 'mb_skpd_has_rekening_rincian_ta')->dropDownList($ta, ['prompt'=>'Tahun Anggaran...']);
            echo $form->field($model, 'mb_skpd_has_rekening_rincian_ta')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                'data' => $ta,
                'options' => [
                    'placeholder' => 'Thn Anggaran..',
                    //'style' => 'width: 1000px'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'width' => '150px'
                ],
            ]);

            echo $form->field($model, 'mb_urusan_has_skpd_id')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                //'size' => Select2::SMALL,
                'initValueText' => $_skpd,
                'options' => [
                    'placeholder' => 'SKPD..',
                    //'style' => 'width: 1000px'
                ],
                'pluginOptions' => [
                    //'width' => 'auto',
                    'allowClear' => true,
                    //'minimumInputLength' => 3,
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

            echo $form->field($model, 'mb_rekening_rincian_id')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                //'size' => Select2::SMALL,
                'initValueText' => $_rinci,
                'options' => [
                    'placeholder' => 'Rincian Rekening..',
                    //'style' => 'width: 1000px'
                ],
                'pluginOptions' => [
                    //'width' => 'auto',
                    'allowClear' => true,
                    //'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['data/rekeningrinci']),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'delay' => 20,
                        'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                        'cache' => 'true'
                    ],
                ],
            ]);
        ?>
        <?= $form->field($model, 'mb_skpd_has_rekening_rincian_penjabaran')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'mb_skpd_has_rekening_rincian_vol')->textInput() ?>

        <?= $form->field($model, 'mb_skpd_has_rekening_rincian_satuan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mb_skpd_has_rekening_rincian_harga')->textInput() ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="mb-skpd-has-rekening-rincian-form">

    

    



    <div class="form-group">
        
    </div>

    

</div>
