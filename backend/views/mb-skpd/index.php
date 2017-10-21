<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSkpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data SKPD';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-skpd-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat SKPD', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_skpd_id',
            'mb_skpd_kode',
            'mb_skpd_nama',
            'mb_skpd_singkatan',
            //'mb_skpd_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
