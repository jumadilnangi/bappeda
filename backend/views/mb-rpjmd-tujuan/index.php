<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rpjmd Tujuans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-tujuan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rpjmd Tujuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rpjmd_tujuan_id',
            'mb_rpjmd_misi_id',
            'mb_tujuan_isi:ntext',
            'mb_tujuan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
