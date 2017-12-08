<?php

namespace common\components\bundles\highchart;

use yii\web\AssetBundle;

/**
* Form Login Asset Bundles
*/
class HighchartAssets extends AssetBundle
{
	public $sourcePath = '@common/components/bundles/highchart/assets';
	/**
	 * @var array css assets
	 */
	public $css = [
		'css/highcharts.css',
	];

	/**
	 * @var array js assets
	 */
	public $js = [
		'js/highcharts.js',
		'modules/exporting.js',
	];

	/**
	 * @var array depends assets
	 */
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}