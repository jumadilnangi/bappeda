<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Tujuans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-tujuan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Tujuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_tujuan_id',
            'mb_rpjmd_misi_id',
            'mb_tujuan_isi:ntext',
            'mb_tujuan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
