<?php
/* @var $this VariabelController */
/* @var $model Variabel */

$this->breadcrumbs=array(
	'Variabels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Variabel', 'url'=>array('index')),
	array('label'=>'Manage Variabel', 'url'=>array('admin')),
);
?>

<h1>Create Variabel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>