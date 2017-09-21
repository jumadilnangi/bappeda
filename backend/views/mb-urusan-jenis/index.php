<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbUrusanJenisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Urusan Jenis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-urusan-jenis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Urusan Jenis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_urusan_jenis_id',
            'mb_urusan_jenis_kode',
            'mb_urusan_jenis_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
