<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSumberDana */

$this->title = 'Update Mb Sumber Dana: ' . $model->mb_sumber_dana_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Sumber Danas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_sumber_dana_id, 'url' => ['view', 'id' => $model->mb_sumber_dana_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-sumber-dana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
