<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningObyek */

$this->title = 'Tambah Obyek Rekening';
$this->params['breadcrumbs'][] = ['label' => 'Data Obyek Rekening ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-obyek-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
