<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRpjmdTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mb Rpjmd Tujuans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rpjmd-tujuan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <p>
        <?= Html::button('Tambah Tujuan', ['value' => Url::to('index.php?r=mb-rpjmd-tujuan/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
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

            'mb_rpjmd_tujuan_id',
            'mbRpjmdMisi.mb_rpjmd_misi_isi',
            'mb_tujuan_isi:ntext',
            'mb_tujuan_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
        <?php    Pjax::end(); ?>
</div>
