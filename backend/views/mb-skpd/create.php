<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpd */

$this->title = 'Create Mb Skpd';
$this->params['breadcrumbs'][] = ['label' => 'Mb Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
