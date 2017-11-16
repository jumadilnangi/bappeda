<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbRekeningStruk */

$this->title = 'Tambah Struk Rekening ';
$this->params['breadcrumbs'][] = ['label' => 'Data Struk Rekening ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-struk-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
