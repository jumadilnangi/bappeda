<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Program';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Program', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mb_program_id',
          //  'mb_urusan_has_skpd_id',
            [
                'attribute'=>'Urusan',
                'value'=>'mbUrusanHasSkpd.mbUrusan.mb_urusan_nama',
            ],
            
             
            
            
            'mb_program_kode',
            'mb_program_nama',
            //'mb_program_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
