<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbSkpdHasRekeningRincian */

$this->title = 'Rincian Anggaran';
$this->params['breadcrumbs'][] = ['label' => 'Data Penyusunan Anggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-has-rekening-rincian-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
