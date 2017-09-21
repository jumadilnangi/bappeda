<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbSasaran */

$this->title = 'Update Mb Sasaran: ' . $model->mb_sasaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Sasarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_sasaran_id, 'url' => ['view', 'id' => $model->mb_sasaran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-sasaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
