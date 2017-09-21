<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdVisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-visi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Visi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rpjmd_visi_id',
            'mb_rpjmd_visi_isi:ntext',
            'mb_rpjmd_visi_awal',
            'mb_rpjmd_visi_akhir',
            'mb_rpjmd_visi_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
