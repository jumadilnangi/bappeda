<?php

namespace common\components\widgets;

use kartik\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yiister\grid\assets\Asset;

/**
* refactory from yiister\grid\widgets\ToggleColumn
*/
class ToggleColumn extends DataColumn
{
	public $updateAction = ['/site/column-update'];

	public $buttons = [
		0 => 'Off',
		1 => 'On',
	];

	public $sizeButton = 'btn-group-xs';

	public function init()
	{
		Asset::register($this->grid->view);
		$this->grid->view->registerJs("ToggleColumn.init();");
	}

	protected function renderDataCellContent($model, $key, $index)
	{
		$items = '';
		foreach ($this->buttons as $value => $label) {
			$items .= Html::label(
				Html::radio(null, $model->{$this->attribute} == $value, ['value' => $value]) . $label,
				$model->{$this->attribute} == $value,
				[
					'class' => 'btn ' . ($model->{$this->attribute} == $value ? 'btn-primary' : 'btn-default'),
				]
			);
		}
		return Html::tag(
			'div',
			$items,
			[
				'data-action' => 'toggle-column',
				'data-attribute' => $this->attribute,
				'data-id' => $model->id,
				'data-model' => get_class($model),
				'data-url' => Url::to($this->updateAction),
				'data-toggle' => 'buttons',
				'class' => $this->sizeButton.' btn-group',
			]
		);
	}
}
?>