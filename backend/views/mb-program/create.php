<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbProgram */

$this->title = 'Create Mb Program';
$this->params['breadcrumbs'][] = ['label' => 'Mb Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
