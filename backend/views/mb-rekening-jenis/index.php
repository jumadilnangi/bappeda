<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningJenisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rekening Jenis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-jenis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rekening Jenis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rekening_jenis_id',
            'mb_rekening_kelompok_id',
            'mb_rekening_jenis_kode',
            'mb_rekening_jenis_nama',
            'mb_rekening_jenis_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
