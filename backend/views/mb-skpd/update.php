<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */

$this->title = 'Update Mb Skpd: ' . $model->mb_skpd_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_skpd_id, 'url' => ['view', 'id' => $model->mb_skpd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-skpd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
