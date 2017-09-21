<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdMisi */

$this->title = 'Create Mb Rpjmd Misi';
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Misis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-misi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
