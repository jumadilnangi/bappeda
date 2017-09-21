<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbUrusan */

$this->title = 'Buat Data Urusan';
$this->params['breadcrumbs'][] = ['label' => 'Data Urusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
