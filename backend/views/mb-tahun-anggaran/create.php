<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbTahunAnggaran */

$this->title = 'Create Mb Tahun Anggaran';
$this->params['breadcrumbs'][] = ['label' => 'Mb Tahun Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-tahun-anggaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
