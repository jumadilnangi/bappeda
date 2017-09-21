<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbIndikatorKinerja */

$this->title = 'Create Mb Indikator Kinerja';
$this->params['breadcrumbs'][] = ['label' => 'Mb Indikator Kinerjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-indikator-kinerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
