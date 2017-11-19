<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Tujuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-tujuan-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::button('Tambah Tujuan', ['value' => Url::to(['create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
   
    
     </p>
    
     <?php 
        Modal::begin([
            'header' => '<h4>Form Isian Tujuan</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
            'options' => [
            'tabindex' => false
            ],
        ]);
        echo "<div id='modalContent'> </div>";
        Modal::end();
    ?>
    
    <?php    Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mb_rpjmd_tujuan_id',
            'mbRpjmdMisi.mbRpjmdVisi.mb_rpjmd_visi_isi',
            'mbRpjmdMisi.mb_rpjmd_misi_isi',
            'mb_tujuan_isi:ntext',
            'mb_tujuan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
        <?php    Pjax::end(); ?>
</div>
