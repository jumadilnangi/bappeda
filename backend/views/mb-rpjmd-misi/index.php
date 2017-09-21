<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdMisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rpjmd Misis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-misi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rpjmd Misi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rpjmd_misi_id',
            'mb_rpjmd_visi_id',
            'mb_rpjmd_misi_isi:ntext',
            'mb_rpjmd_misi_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
