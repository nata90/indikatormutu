<?php
/* @var $this SatkerController */
/* @var $model Satker */

$this->breadcrumbs=array(
	'Satkers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Satker', 'url'=>array('index')),
	array('label'=>'Manage Satker', 'url'=>array('admin')),
);
?>

<h1>Create Satker</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>