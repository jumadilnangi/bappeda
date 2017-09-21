<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStruk */

$this->title = 'Update Mb Rekening Struk: ' . $model->mb_rekening_struk_id;
$this->params['breadcrumbs'][] = ['label' => 'Mb Rekening Struks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mb_rekening_struk_id, 'url' => ['view', 'id' => $model->mb_rekening_struk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mb-rekening-struk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
