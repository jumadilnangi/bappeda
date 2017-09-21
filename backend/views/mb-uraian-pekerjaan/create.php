<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MbUraianPekerjaan */

$this->title = 'Buat Uraian Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Uraian Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-uraian-pekerjaan-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
