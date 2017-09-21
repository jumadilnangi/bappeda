<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdVisi */

$this->title = 'Update Mb Rpjmd Visi: ' . $model->mb_rpjmd_visi_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Visis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rpjmd_visi_id, 'url' => ['view', 'id' => $model->mb_rpjmd_visi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rpjmd-visi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
