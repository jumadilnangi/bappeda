<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdTujuan */

$this->title = 'Update Mb Rpjmd Tujuan: ' . $model->mb_rpjmd_tujuan_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rpjmd_tujuan_id, 'url' => ['view', 'id' => $model->mb_rpjmd_tujuan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rpjmd-tujuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
