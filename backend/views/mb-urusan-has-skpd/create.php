<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusanHasSkpd */

$this->title = 'Create Mb Urusan Has Skpd';
$this->params['breadcrumbs'][] = ['label' => 'Mb Urusan Has Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-has-skpd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
