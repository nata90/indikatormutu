<?php
/* @var $this VariabelSatkerController */
/* @var $model VariabelSatker */

$this->breadcrumbs=array(
	'Variabel Satkers'=>array('index'),
	$model->id_variabel_satker,
);

$this->menu=array(
	array('label'=>'List VariabelSatker', 'url'=>array('index')),
	array('label'=>'Create VariabelSatker', 'url'=>array('create')),
	array('label'=>'Update VariabelSatker', 'url'=>array('update', 'id'=>$model->id_variabel_satker)),
	array('label'=>'Delete VariabelSatker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_variabel_satker),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VariabelSatker', 'url'=>array('admin')),
);
?>

<h1>View VariabelSatker #<?php echo $model->id_variabel_satker; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_variabel_satker',
		'id_variabel',
		'id_satker',
		'status_variabel',
	),
)); ?>
