<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbSumberDanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sumber Dana';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-sumber-dana-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Sumber Dana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_sumber_dana_id',
            'mb_sumber_dana_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
