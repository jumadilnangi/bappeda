<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRpjmdSasaran */

$this->title = 'Create Mb Rpjmd Sasaran';
$this->params['breadcrumbs'][] = ['label' => 'Mb Rpjmd Sasarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-sasaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
