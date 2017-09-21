<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */

$this->title = 'Update Mb Rpjmd Sasaran: ' . $model->mb_rpjmd_sasaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Sasarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rpjmd_sasaran_id, 'url' => ['view', 'id' => $model->mb_rpjmd_sasaran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rpjmd-sasaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
