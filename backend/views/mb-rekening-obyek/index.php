<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MbRekeningObyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Obyek Rekening ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mb-rekening-obyek-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('+ Obyek Rekening', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mb_rekening_obyek_id',
            'mbRekeningJenis.mbRekeningKelompok.mbRekeningStruk.mb_rekening_struk_nama',
            'mbRekeningJenis.mbRekeningKelompok.mb_rekening_kelompok_nama',
            'mbRekeningJenis.mb_rekening_jenis_nama',
            'mb_rekening_obyek_kode',
            'mb_rekening_obyek_nama',
            //'mb_rekening_obyek_ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
