<?php
/* @var $this VariabelController */
/* @var $model Variabel */

$this->breadcrumbs=array(
	'Variabels'=>array('index'),
	$model->id_variabel,
);

$this->menu=array(
	array('label'=>'List Variabel', 'url'=>array('index')),
	array('label'=>'Create Variabel', 'url'=>array('create')),
	array('label'=>'Update Variabel', 'url'=>array('update', 'id'=>$model->id_variabel)),
	array('label'=>'Delete Variabel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_variabel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Variabel', 'url'=>array('admin')),
);
?>

<h1>View Variabel #<?php echo $model->id_variabel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_variabel',
		'uraian_variabel',
		'status_variabel',
	),
)); ?>
