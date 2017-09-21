<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-visi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_rpjmd_visi_id') ?>

    <?= $form->field($model, 'mb_rpjmd_visi_isi') ?>

    <?= $form->field($model, 'mb_rpjmd_visi_awal') ?>

    <?= $form->field($model, 'mb_rpjmd_visi_akhir') ?>

    <?= $form->field($model, 'mb_rpjmd_visi_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
