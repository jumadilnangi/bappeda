<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningStrukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Struk Rekening ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-struk-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Struk Rekening ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_rekening_struk_id',
            'mb_rekening_struk_kode',
            'mb_rekening_struk_nama',
           // 'mb_rekening_struk_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
