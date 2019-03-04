<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */

$this->breadcrumbs=array(
	'Ind Satkers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IndSatker', 'url'=>array('index')),
	array('label'=>'Manage IndSatker', 'url'=>array('admin')),
);
?>

<h1>Create IndSatker</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>