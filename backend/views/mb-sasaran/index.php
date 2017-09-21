<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Sasarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-sasaran-index" style="overflow-x: auto;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Sasaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_sasaran_id',
            'mbPrioritas.mb_prioritas_nama',
            'mb_sasaran_nama',
            //'mb_sasaran_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
