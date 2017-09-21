<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mb-rpjmd-misi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mb_rpjmd_misi_id') ?>

    <?= $form->field($model, 'mb_rpjmd_visi_id') ?>

    <?= $form->field($model, 'mb_rpjmd_misi_isi') ?>

    <?= $form->field($model, 'mb_rpjmd_misi_ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
