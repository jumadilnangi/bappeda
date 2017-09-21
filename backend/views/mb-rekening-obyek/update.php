<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */

$this->title = 'Update Mb Rekening Obyek: ' . $model->mb_rekening_obyek_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Obyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_obyek_id, 'url' => ['view', 'id' => $model->mb_rekening_obyek_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-obyek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
