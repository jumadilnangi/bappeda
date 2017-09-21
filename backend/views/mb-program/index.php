<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Program', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_program_id',
            'mb_urusan_has_skpd_id',
            'mb_program_kode',
            'mb_program_nama',
            'mb_program_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
