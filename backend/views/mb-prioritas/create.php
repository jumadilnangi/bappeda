<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbPrioritas */

$this->title = 'Create Mb Prioritas';
$this->params['breadcrumbs'][] = ['label' => 'Mb Prioritas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
