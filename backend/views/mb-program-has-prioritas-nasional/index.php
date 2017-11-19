<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbProgramHasPrioritasNasionalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Sinkronsiasi Program Prioritas Nasionals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-program-has-prioritas-nasional-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Sinkronisasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'mb_program_has_prioritas_nasional_id',
           [
                'attribute'=>'Urusan',
                'value'=>'mbProgram.mbUrusanHasSkpd.mbUrusan.mb_urusan_nama',
            ],
            
            [
                'attribute'=>'Program',
                'value'=>'mbProgram.mb_program_nama',
            ],
            
           [
                'attribute'=>'Prioritas Nasional',
                'value'=>'mbPrioritasNasional.mb_prioritas_nasional_nama',
            ],
            //'mb_prioritas_nasional_id',
            'mb_program_has_prioritas_nasional_awal',
            'mb_program_has_prioritas_nasional_akhir',
            // 'mb_program_has_prioritas_nasional_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
