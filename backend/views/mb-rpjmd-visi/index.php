<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdVisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-visi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    
    <p>
        <?= Html::button('Tambah Visi', ['value' => Url::to('index.php?r=mb-rpjmd-visi/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
     <?php 
        Modal::begin([
            'header' => '<h4>Form Isian Visi</h4>',
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

            'mb_rpjmd_visi_id',
            'mb_rpjmd_visi_isi:ntext',
            'mb_rpjmd_visi_awal',
            'mb_rpjmd_visi_akhir',
            'mb_rpjmd_visi_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
       <?php    Pjax::end(); ?>
</div>
