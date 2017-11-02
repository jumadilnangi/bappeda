<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;

use app\models\AuthItem;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="box box-primary">
    <div class="box-header with-border">
        <?php echo Html::a('<i class="fa fa-reply"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>
        <?php echo Html::submitButton('<i class=\"fa fa-save\"></i>  Simpan', ['class' => 'btn btn-success']) ?>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php
            echo $form->field($model, 'username')->textInput(['autofocus' => true]);

            echo $form->field($model, 'email');

            echo $form->field($model, 'password')->passwordInput();

            echo $form->field($model, 'role')->widget(Select2::classname(),[
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['placeholder' => 'Pilih Role User..',],
                'pluginOptions' => [
                    'allowClear' => true,
                    //'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Menunngu respon server...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['data/get-role']),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'delay' => 20,
                        'data' => new JsExpression('function(cari){return { cari: cari.term, page: 30 }}'),
                        'cache' => 'true'
                    ],
                ],
            ]);

            echo $form->field($model, 'status')->dropDownList(['0' => 'Disable', '10' => 'Aktif'], 
                        ['prompt'=>'Status...']);
        ?>
        
        <?php echo Html::a('<i class="fa fa-reply"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>
        <?php echo Html::submitButton('<i class=\"fa fa-save\"></i>  Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>