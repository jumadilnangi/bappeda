<?php

namespace common\components\bundles\amcharts;

use yii\web\AssetBundle;

/**
* Form Login Asset Bundles
*/
class AmchartsAssets extends AssetBundle
{
	public $sourcePath = '@common/components/bundles/amcharts/assets';
	/**
	 * @var array css assets
	 */
	//public $css = [
	//	'pages/css/profile.min.css',
	//];

	/**
	 * @var array js assets
	 */
	public $js = [
		'amcharts.js',
		'serial.js',
		'pie.js',
		'plugins/export/export.min.js',
		//'pages/scripts/charts-amcharts.min.js',
	];

	/**
	 * @var array depends assets
	 */
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}