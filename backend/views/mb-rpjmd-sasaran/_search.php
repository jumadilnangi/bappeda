<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-sasaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_rpjmd_sasaran_id') ?>

    <?= $form->field($model, 'mb_rpjmd_tujuan_id') ?>

    <?= $form->field($model, 'mb_sasaran_isi') ?>

    <?= $form->field($model, 'mb_sasaran_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
