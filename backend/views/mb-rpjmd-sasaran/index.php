<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rpjmd Sasarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-sasaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      
    <p>
        <?= Html::button('Tambah Sasaran', ['value' => Url::to('index.php?r=mb-rpjmd-sasaran/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
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

            'mb_rpjmd_sasaran_id',
            'mb_rpjmd_tujuan_id',
            'mb_sasaran_isi:ntext',
            'mb_sasaran_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     <?php    Pjax::end(); ?>
</div>
