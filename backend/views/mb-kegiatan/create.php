<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbKegiatan */

$this->title = 'Create Mb Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Mb Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
