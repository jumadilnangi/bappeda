<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbTujuan */

$this->title = 'Create Mb Tujuan';
$this->params['breadcrumbs'][] = ['label' => 'Mb Tujuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-tujuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
