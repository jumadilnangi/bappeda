<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKelurahanDesa */

$this->title = 'Create Mb Kelurahan Desa';
$this->params['breadcrumbs'][] = ['label' => 'Mb Kelurahan Desas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-kelurahan-desa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
