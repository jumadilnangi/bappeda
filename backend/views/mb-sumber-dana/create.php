<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSumberDana */

$this->title = 'Create Mb Sumber Dana';
$this->params['breadcrumbs'][] = ['label' => 'Mb Sumber Danas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-sumber-dana-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
