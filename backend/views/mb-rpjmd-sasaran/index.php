<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Sasaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-sasaran-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      
    <p>
        <?= Html::button('Tambah Sasaran', ['value' => Url::to(['create']), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
     <?php 
        Modal::begin([
            'header' => '<h4>Form Isian Sasaran</h4>',
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

            //'mb_rpjmd_sasaran_id',
            'mbRpjmdTujuan.mbRpjmdMisi.mb_rpjmd_misi_isi',
            'mbRpjmdTujuan.mb_tujuan_isi',
            'mb_sasaran_isi:ntext',
          //  'mb_sasaran_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     <?php    Pjax::end(); ?>
</div>
