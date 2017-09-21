<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbTahunAnggaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Tahun Anggaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-tahun-anggaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Tahun Anggaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_tahun_anggaran_id',
            'mb_tahun_anggaran_nama',
            'mb_tahun_anggaran_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
