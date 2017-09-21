<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */

$this->title = 'Update Mb Program: ' . $model->mb_program_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_program_id, 'url' => ['view', 'id' => $model->mb_program_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
