<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningObyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rekening Obyeks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-obyek-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mb Rekening Obyek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mb_rekening_obyek_id',
            'mb_rekening_jenis_id',
            'mb_rekening_obyek_kode',
            'mb_rekening_obyek_nama',
            'mb_rekening_obyek_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
