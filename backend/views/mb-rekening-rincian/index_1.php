<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningRincianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rekening Rincians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-rincian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rekening Rincian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rekening_rincian_id',
            'mb_rekening_obyek_id',
            'mb_rekening_rincian_kode',
            'mb_rekening_rincian_nama',
            'mb_rekening_rincian_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
