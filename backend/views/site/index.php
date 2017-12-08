<?php

use common\components\bundles\highchart\HighchartAssets;

/* @var $this yii\web\View */

$this->title = 'Dashboard';

HighchartAssets::register($this);

$var = [
    'catChart' => $skpd,
    'json' => $json,
];
$this->registerJs('var out = '.$json.';');
$this->registerJs('var vars = '.json_encode($var).';');
$this->registerJs($this->render('chart.js'), \yii\web\View::POS_READY);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafik</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
