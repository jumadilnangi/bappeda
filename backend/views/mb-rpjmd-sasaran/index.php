<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rpjmd Sasarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-sasaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rpjmd Sasaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rpjmd_sasaran_id',
            'mb_rpjmd_tujuan_id',
            'mb_sasaran_isi:ntext',
            'mb_sasaran_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
