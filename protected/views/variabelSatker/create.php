<?php
/* @var $this VariabelSatkerController */
/* @var $model VariabelSatker */

$this->breadcrumbs=array(
	'Variabel Satkers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VariabelSatker', 'url'=>array('index')),
	array('label'=>'Manage VariabelSatker', 'url'=>array('admin')),
);
?>

<h1>Create VariabelSatker</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>