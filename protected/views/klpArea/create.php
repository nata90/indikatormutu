<?php
/* @var $this KlpAreaController */
/* @var $model KlpArea */

$this->breadcrumbs=array(
	'Klp Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KlpArea', 'url'=>array('index')),
	array('label'=>'Manage KlpArea', 'url'=>array('admin')),
);
?>

<h1>Create KlpArea</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>