<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-tahun-anggaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_tahun_anggaran_id') ?>

    <?= $form->field($model, 'mb_tahun_anggaran_nama') ?>

    <?= $form->field($model, 'mb_tahun_anggaran_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
