<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusan */

$this->title = 'Update Mb Urusan: ' . $model->mb_urusan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Urusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_urusan_id, 'url' => ['view', 'id' => $model->mb_urusan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-urusan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
