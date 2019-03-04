<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
	'Units'=>array('index'),
	$model->id_unit,
);

$this->menu=array(
	array('label'=>'List Unit', 'url'=>array('index')),
	array('label'=>'Create Unit', 'url'=>array('create')),
	array('label'=>'Update Unit', 'url'=>array('update', 'id'=>$model->id_unit)),
	array('label'=>'Delete Unit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_unit),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Unit', 'url'=>array('admin')),
);
?>

<h1>View Unit #<?php echo $model->id_unit; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_unit',
		'nama_unit',
		'inisial',
	),
)); ?>
