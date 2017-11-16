<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbPrioritasNasionalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Prioritas Nasional';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-prioritas-nasional-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Prioritas Nasional', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mb_prioritas_nasional_id',
            'mb_prioritas_nasional_kode',
            'mb_prioritas_nasional_nama:ntext',
            'mb_prioritas_nasional_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
