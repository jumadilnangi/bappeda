<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbPrioritasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Prioritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Prioritas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_prioritas_id',
            'mb_prioritas_nama',
            'mb_prioritas_no_urut',
            'mb_prioritas_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
